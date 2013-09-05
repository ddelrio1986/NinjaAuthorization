<?php
/**
 * User Interface
 *
 * This is the user interface which should be implemented by the user entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User Interface
 *
 * This is the user interface which should be implemented by the user entity.
 *
 * @package NinjaAuthorization\Entity
 */
interface UserInterface
{

    /**
     * Get Role Assignments
     *
     * Gets the role assignments associated with this user.
     *
     * @return AbstractRoleAssignment[] The role assignments associated with this user.
     */
    public function getRoleAssignments();

    /**
     * Add Role Assignment
     *
     * Add a role assignment to this user.
     *
     * @param AbstractRoleAssignment $roleAssignment The role assignments to add to this user.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function addRoleAssignment(AbstractRoleAssignment $roleAssignment);

    /**
     * Get Permissions
     *
     * Gets the permissions associated with this user.
     *
     * @return AbstractPermission[] The permissions associated with this user.
     */
    public function getPermissions();

    /**
     * Add Permission
     *
     * Add a permission to this user.
     *
     * @param AbstractPermission $permission The permisison to add to this user.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function addPermission(AbstractPermission $permission);
}
