<?php
/**
 * Role Assignment
 *
 * This is the file for the RoleAssignment entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role Assignment
 *
 * This is the RoleAssignment entity.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\Service\RoleAssignment")
 * @ORM\Table(name="role_assignment")
 */
class RoleAssignment extends AbstractEntity
{

// Properties representing columns in the corresponding database table.

    /**
     * User ID
     *
     * The ID of the User entity associated with this RoleAssignment entity.
     *
     * @var int The ID of the User entity associated with this RoleAssignment entity.
     * @ORM\Column(type="integer", name="user_id")
     */
    protected $userId;

    /**
     * Role ID
     *
     * The ID of the Role entity associated with this RoleAssignment entity.
     *
     * @var int The ID of the Role entity associated with this RoleAssignment entity.
     * @ORM\Column(type="integer", name="role_id")
     */
    protected $roleId;

// Properties representing associations with other entities.

    /**
     * User
     *
     * The User entity associated with this RoleAssignment entity.
     *
     * @var UserInterface The User entity associated with this RoleAssignment entity.
     * @ORM\ManyToOne(targetEntity="UserInterface", inversedBy="roleAssignments")
     */
    protected $user;

    /**
     * Role
     *
     * The Role entity associated with this RoleAssignment entity.
     *
     * @var Role The Role entity associated with this RoleAssignment entity.
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="roleAssignments")
     */
    protected $role;

// Getters and setters for properties representing columns in the corresponding database table.

    /**
     * Get User ID
     * 
     * Gets the ID of the User entity associated with this RoleAssignment entity.
     * 
     * @return int The ID of the User entity associated with this RoleAssignment entity.
     */
    public function getUserId()
    {
        return $this->userId;
    }
    
    /**
     * Set User ID
     * 
     * Sets the ID of the User entity that this RoleAssignment entity should be associated with.
     * 
     * @param int $userId The ID of the User entity that this RoleAssignment entity should be associated with.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setUserId($userId)
    {
        $this->userId = (int)$userId;
        return $this;
    }
    
    /**
     * Get Role ID
     *
     * Gets the ID of the Role entity associated with this RoleAssignment entity.
     *
     * @return int The ID of the Role entity associated with this RoleAssignment entity.
     */
    public function getRoleId()
    {
        return $this->roleId;
    }
    
    /**
     * Set Role ID
     *
     * Sets the ID of the Role entity that this RoleAssignment entity should be associated with.
     *
     * @param int $roleId The ID of the Role entity that this RoleAssignment entity should be associated with.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setRoleId($roleId)
    {
        $this->roleId = (int)$roleId;
        return $this;
    }

// Getters and setters for properties representing associations with other entities.

    /**
     * Get User
     *
     * Gets the User entity that this RoleAssignment entity is associated with.
     *
     * @return UserInterface The User entity that this RoleAssignment entity is associated with.
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * Set User
     *
     * Sets the User entity that this RoleAssignment entity should be associated with.
     *
     * @param UserInterface $user The User entity that this RoleAssignment entity should be associated with.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setUser(UserInterface $user)
    {
        $user->addRoleAssignment($this);
        $this->user = $user;
        return $this;
    }
    
    /**
     * Get Role
     *
     * Gets the Role entity that this RoleAssignment entity is associated with.
     *
     * @return Role The Role entity that this RoleAssignment entity is associated with.
     */
    public function getRole()
    {
        return $this->role;
    }
    
    /**
     * Set Role
     *
     * Sets the Role entity that this RoleAssignment entity should be associated with.
     *
     * @param Role $role The Role entity that this RoleAssignment entity should be associated with.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setRole(Role $role)
    {
        $role->addRoleAssignment($this);
        $this->role = $role;
        return $this;
    }
}