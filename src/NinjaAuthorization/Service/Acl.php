<?php
/**
 * ACL
 *
 * ACL service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use Doctrine\Common\Persistence\ObjectManager;
use NinjaAuthorization\EntityRepository\Permission as PermissionEntityRepository;
use NinjaAuthorization\EntityRepository\Resource as ResourceEntityRepository;
use NinjaAuthorization\EntityRepository\Role as RoleEntityRepository;
use NinjaAuthorization\EntityRepository\RoleAssignment as RoleAssignmentEntityRepository;
use NinjaAuthorization\Permissions\Acl\AclFactory as AclCreator;
use NinjaAuthorization\Permissions\Acl\Resource\GenericResourceFactory;
use NinjaAuthorization\Permissions\Acl\Role\GenericRoleFactory;
use Zend\Permissions\Acl\Acl as ZendAcl;

/**
 * ACL
 *
 * ACL service.
 *
 * @package NinjaAuthorization\Service
 */
class Acl extends AbstractService
{

  /**
   * ACL Factory
   *
   * @var AclCreator A factory used to create an instance of ZF's ACL class.
   */
  protected $aclCreator;

  /**
   * Application Config
   *
   * @var array The application configuration.
   */
  protected $applicationConfig;

  /**
   * Generic Resource Factory
   *
   * @var GenericResourceFactory A factory used to create an instance of ZF's generic resource class.
   */
  protected $genericResourceFactory;

  /**
   * Generic Role Factory
   *
   * @var GenericRoleFactory A factory used to create an instance of ZF's generic role class.
   */
  protected $genericRoleFactory;

  /**
   * Permission Entity Repository
   *
   * @var PermissionEntityRepository The entity repository for the permission entity.
   */
  protected $permissionEntityRepository;

  /**
   * Resource Entity Repository
   *
   * @var ResourceEntityRepository The resource entity repository.
   */
  protected $resourceEntityRepository;

  /**
   * Role Assignment Entity Repository
   *
   * @var RoleAssignmentEntityRepository The entity repository for the role assignment entity.
   */
  protected $roleAssignmentEntityRepository;

  /**
   * Role Entity Repository
   *
   * @var RoleEntityRepository The role entity repository.
   */
  protected $roleEntityRepository;

  /**
   * __construct
   *
   * Used to store dependencies to properties.
   *
   * @param AclCreator $aclCreator A factory used to create an instance of ZF's ACL class.
   * @param array $applicationConfig The application configuration.
   * @param GenericResourceFactory $genericResourceFactory A factory used to create an instance of ZF's generic resource class.
   * @param GenericRoleFactory $genericRoleFactory A factory used to create an instance of ZF's generic role class.
   * @param ObjectManager $objectManager The Doctrine object manager.
   * @param PermissionEntityRepository $permissionEntityRepository The entity repository for the permission entity.
   * @param ResourceEntityRepository $resourceEntityRepository The resource entity repository.
   * @param RoleAssignmentEntityRepository $roleAssignmentEntityRepository The entity repository for the role assignment entity.
   * @param RoleEntityRepository $roleEntityRepository The role entity repository.
   */
  public function __construct(
    AclCreator $aclCreator,
    array $applicationConfig,
    GenericResourceFactory $genericResourceFactory,
    GenericRoleFactory $genericRoleFactory,
    ObjectManager $objectManager,
    PermissionEntityRepository $permissionEntityRepository,
    ResourceEntityRepository $resourceEntityRepository,
    RoleAssignmentEntityRepository $roleAssignmentEntityRepository,
    RoleEntityRepository $roleEntityRepository
  )
  {
    parent::__construct($objectManager);
    $this->aclCreator = $aclCreator;
    $this->applicationConfig = $applicationConfig;
    $this->genericResourceFactory = $genericResourceFactory;
    $this->genericRoleFactory = $genericRoleFactory;
    $this->permissionEntityRepository = $permissionEntityRepository;
    $this->resourceEntityRepository = $resourceEntityRepository;
    $this->roleAssignmentEntityRepository = $roleAssignmentEntityRepository;
    $this->roleEntityRepository = $roleEntityRepository;
  }

  /**
   * Get By User ID
   *
   * Create an ACL object for the specified user.
   *
   * @param int|null $userId A user's ID or null for a guest user.
   * @return ZendAcl The ACL for the user.
   */
  public function getByUserId($userId)
  {

    // Cleanse input.
    $userId = (int)$userId;

    // Get an ACL instance to use.
    $acl = $this->aclCreator->createService();

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
   * @param ZendAcl $acl The Acl object to add all of the roles to.
   */
  public function addAllRoles(ZendAcl $acl)
  {

    // Get all of the roles.
    $roles = $this->roleEntityRepository->findAll();

    // Add the roles to the acl object.
    foreach ($roles as $role) {
      $zendRole = $this->genericRoleFactory->createService($role->getName());
      $parents = array();
      if ($role->getParent()) {
        $parents[] = $role->getParent()->getName();
      }
      $acl->addRole($zendRole, $parents);
    }
  }

  /**
   * Add All Resources
   *
   * All all of the available resources to the ACL object.
   *
   * @param ZendAcl $acl The ACL object to add the resources to.
   */
  public function addAllResources(ZendAcl $acl)
  {

    // Get all of the resources.
    $resources = $this->resourceEntityRepository->findAll();

    // Add the resources to the acl.
    foreach ($resources as $resource) {
      $zfResource = $this->genericResourceFactory->createService($resource->getName());
      $acl->addResource($zfResource);
    }
  }

  /**
   * Add Non-User Permissions
   *
   * Adds all of the permissions not assigned to a specific user to the acl.
   *
   * @param ZendAcl $acl The acl to add permissions to.
   */
  public function addNonUserPermissions(ZendAcl $acl)
  {

    // Let admins do everything.
    $acl->allow($this->applicationConfig["ninja_authorization"]["admin_role_name"]);

    // Get the permissions that are tied to a role and not to a user.
    $permissions = $this->permissionEntityRepository->getRolePermissions();

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
   * @param ZendAcl $acl The acl object to add the role to.
   * @param int $userId The ID of the user to add a role for.
   */
  public function addUserRole(ZendAcl $acl, $userId)
  {

    // Cleanse input.
    $userId = (int)$userId;

    // Get the roles that user is assigned to.
    if (0 !== $userId) {
      $roleAssignments = $this->roleAssignmentEntityRepository->getByUserId($userId);

      // Get the parent roles for the user.
      $parents = array();
      foreach ($roleAssignments as $roleAssignment) {
        $parents[] = $roleAssignment->getRole()->getName();
      }

      $acl->addRole(
        $this->genericRoleFactory->createService(
          $this->applicationConfig["ninja_authorization"]["current_user_role_name"]
        ),
        $parents
      );

    // Setup user role for a guest.
    } else {
      $acl->addRole(
        $this->genericRoleFactory->createService(
          $this->applicationConfig["ninja_authorization"]["current_user_role_name"]
        ),
        array($this->applicationConfig["ninja_authorization"]["guest_role_name"])
      );
    }
  }

  /**
   * Add User Permissions
   *
   * Adds the permissions that were tied directly to the user.
   *
   * @param ZendAcl $acl The acl object to add the role to.
   * @param int $userId The ID of the user.
   */
  public function addUserPermissions(ZendAcl $acl, $userId)
  {

    // Cleanse input.
    $userId = (int)$userId;

    if (0 !== $userId) {

      // Get the permissions for the user.
      $permissions = $this->permissionEntityRepository->getByUserId($userId);

      // Add the permissions.
      foreach ($permissions as $permission) {
        $resource = ($permission->getResource()) ? $permission->getResource()->getName() : null;
        $privilege = ($permission->getPrivilege()) ? $permission->getPrivilege()->getName() : null;

        if ($permission->getAllow()) {
          $acl->allow($this->applicationConfig["ninja_authorization"]["current_user_role_name"], $resource, $privilege);
        } else {
          $acl->deny($this->applicationConfig["ninja_authorization"]["current_user_role_name"], $resource, $privilege);
        }
      }
    }
  }
}
