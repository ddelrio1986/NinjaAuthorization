<?php
/**
 * ACL
 *
 * This is the ACL service. It is used to retrieve ACL objects for users.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use Zend\Permissions\Acl\Acl as ZFAcl;
use Zend\Permissions\Acl\Role\GenericRole as ZFRole;
use Zend\Permissions\Acl\Resource\GenericResource as ZFResource;

/**
 * ACL
 *
 * This is the ACL service. It is used to retrieve ACL objects for users.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */
class Acl extends AbstractService
{

    const CURRENT_USER_ROLE = 'current-user';

    /**
     * Get ACL By User ID
     *
     * Create an ACL object for the specified user.
     *
     * @param int $userId A user's ID.
     * @return ZFAcl The ACL for the user.
     */
    public function getAclByUserId($userId)
    {

        // Cleanse input.
        $userId = (int)$userId;

        // Create a new ACL object.
        $serviceLocator = $this->getServiceLocator();
        $acl = $serviceLocator->get('ZFAcl');

        // Add all of the roles to the Acl object.
        $this->addAllRoles($acl);

        // Add all of the resources to the Acl object.
        $this->addAllResources($acl);

        // Add all of the permissions not tied to a specific user.
        $this->addNonUserPermissions($acl);

        // Add user role.
        $this->addUserRole($acl, $userId);

        // Add user permissions.
        $this->addUserPermissions($acl, $userId);

        return $acl;
    }

    /**
     * Add All Roles
     *
     * Will add all of the rows in the database to the Acl object.
     *
     * @param ZFAcl $acl The Acl object to add all of the roles to.
     */
    public function addAllRoles(ZFAcl $acl)
    {

        // Get all of the roles.
        $serviceLocator = $this->getServiceLocator();
        $roleService = $serviceLocator->get('RoleService');
        $roles = $roleService->findBy(array('deleted' => false), array('id' => 'ASC'));

        // Add the roles to the acl object.
        foreach ($roles as $role) {
            $zfRole = new ZFRole($role->getName());
            $parents = array();
            if ($role->getParent()) {
                $parents[] = $role->getParent()->getName();
            }
            $acl->addRole($zfRole, $parents);
        }
    }

    /**
     * Add All Resources
     *
     * All all of the available resources to the Acl object.
     *
     * @param ZFAcl $acl The acl object to add the resources to.
     */
    public function addAllResources(ZFAcl $acl)
    {

        // Get all of the resources.
        $serviceLocator = $this->getServiceLocator();
        $resourceService = $serviceLocator->get('ResourceService');
        $resources = $resourceService->findBy(array('deleted' => false), array('id' => 'ASC'));

        // Add the resources to the acl.
        foreach ($resources as $resource) {
            $zfResource = new ZFResource($resource->getName());
            $acl->addResource($zfResource);
        }
    }

    /**
     * Add Non-User Permissions
     *
     * Adds all of the permissions not assigned to a specific user to the acl.
     *
     * @param ZFAcl $acl The acl to add permissions to.
     */
    public function addNonUserPermissions(ZFAcl $acl)
    {

        // Let admins do everything.
        $acl->allow('admin');

        // Get the permissions to add.
        $serviceLocator = $this->getServiceLocator();
        $permissionService = $serviceLocator->get('PermissionService');
        $permissions = $permissionService->findBy(array('deleted' => false, 'userId' => null,), array('id' => 'ASC'));

        // Add the permissions.
        foreach ($permissions as $permission) {
            $role = $permission->getRole()->getName();
            $resource = ($permission->getResource()) ? $permission->getResource()->getName() : null;
            $privilege = ($permission->getPrivilege()) ? $permission->getPrivilege()->getName() : null;

            if ($permission->getAllow()) {
                $acl->allow($role, $resource, $privilege);
            } else {
                $acl->deny($role, $resource, $privilege);
            }
        }
    }

    /**
     * Add User Role
     *
     * Add a role to hold privileges for a specific user.
     *
     * @param ZFAcl $acl The acl object to add the role to.
     * @param int $userId The ID of the user to add a role for.
     */
    public function addUserRole(ZFAcl $acl, $userId)
    {

        // Cleanse input.
        $userId = (int)$userId;

        // Get the roles that user is assigned to.
        $serviceLocator = $this->getServiceLocator();
        $roleAssignmentService = $serviceLocator->get('RoleAssignmentService');
        $roleAssignments = $roleAssignmentService->findBy(
            array('userId' => $userId, 'deleted' => false),
            array('id' => 'ASC')
        );

        // Get the parent roles for the user.
        $parents = array();
        foreach ($roleAssignments as $roleAssignment) {
            $parents[] = $roleAssignment->getRole()->getName();
        }

        $acl->addRole(new ZFRole(self::CURRENT_USER_ROLE), $parents);
    }

    /**
     * Add User Permissions
     *
     * Adds the permissions that were tied directly to the user.
     *
     * @param ZFAcl $acl The acl object to add the role to.
     * @param int $userId The ID of the user.
     */
    public function addUserPermissions(ZFAcl $acl, $userId)
    {

        // Cleanse input.
        $userId = (int)$userId;

        // Get the permissions for the user.
        $serviceLocator = $this->getServiceLocator();
        $permissionService = $serviceLocator->get('PermissionService');
        $permissions = $permissionService->findBy(
            array('userId' => $userId, 'deleted' => false),
            array('id' => 'ASC')
        );

        // Add the permissions.
        foreach ($permissions as $permission) {
            $resource = ($permission->getResource()) ? $permission->getResource()->getName() : null;
            $privilege = ($permission->getPrivilege()) ? $permission->getPrivilege()->getName() : null;

            if ($permission->getAllow()) {
                $acl->allow(self::CURRENT_USER_ROLE, $resource, $privilege);
            } else {
                $acl->deny(self::CURRENT_USER_ROLE, $resource, $privilege);
            }
        }
    }
}
