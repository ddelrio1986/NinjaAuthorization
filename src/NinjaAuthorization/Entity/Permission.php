<?php
/**
 * Permission
 *
 * This is the file for the Permission entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace Eportal\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permission
 *
 * This is the file for the Permission entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 * @ORM\Entity(repositoryClass="NinjaAuthorization\Service\Permission")
 */
class Permission extends AbstractEntity
{

// Properties representing columns in the corresponding database table.

    /**
     * Role ID
     *
     * The ID of the Role entity that this Permission entity is associated with.
     *
     * @var int
     * @ORM\Column(type="integer", name="role_id", nullable=true)
     */
    protected $roleId;

    /**
     * User ID
     *
     * The ID of the User entity that this Permission entity is associated with.
     *
     * @var int
     * @ORM\Column(type="integer", name="user_id", nullable=true)
     */
    protected $userId;

    /**
     * Resource ID
     *
     * The ID of the Resource entity that this Permission entity is associated with.
     *
     * @var int
     * @ORM\Column(type="integer", name="resource_id", nullable=true)
     */
    protected $resourceId;

    /**
     * Privilege ID
     *
     * The ID of the Privilege entity that this Permission entity is associated with.
     *
     * @var int
     * @ORM\Column(type="integer", name="privilege_id", nullable=true)
     */
    protected $privilegeId;

// Properties representing associations with other entities.

    /**
     * Role
     *
     * The Role entity that this Permission entity is associated with.
     *
     * @var Role
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="permissions")
     */
    protected $role;

    /**
     * User
     *
     * The User entity that this Permission entity is associated with.
     *
     * @var User
     * @ORM\ManyToOne(targetEntity="User", inversedBy="permissions")
     */
    protected $user;

    /**
     * Resource
     *
     * The Resource entity that this Permission entity is associated with.
     *
     * @var Resource
     * @ORM\ManyToOne(targetEntity="Resource", inversedBy="permissions")
     */
    protected $resource;

    /**
     * Privilege
     *
     * The Privilege entity that this Permission entity is associated with.
     *
     * @var Privilege
     * @ORM\ManyToOne(targetEntity="Privilege", inversedBy="permissions")
     */
    protected $privilege;

// Getter and setters for properties representing columns in the corresponding database table.

    /**
     * Get Role ID
     *
     * Gets the ID of the Role entity that this Permission entity is associated with.
     *
     * @return int The ID of the Role entity that this Permission entity is associated with.
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set Role ID
     *
     * Sets the ID of the Role entity that this Permission entity should be associated with.
     *
     * @param int $roleId The ID of the Role entity that this Permission entity should be associated with.
     * @return $this Returns itself to allow for a fluent interface.
     */
    public function setRoleId($roleId = null)
    {
        if (null !== $roleId) {
            $roleId = (int)$roleId;
        }
        $this->roleId = $roleId;
        return $this;
    }

    /**
     * Get User ID
     *
     * Gets the ID of the User entity that this Permission entity is associated with.
     *
     * @return int The ID of the User entity that this Permission entity is associated with.
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set User ID
     *
     * Sets the ID of the User entity that this Permission entity should be associated with.
     *
     * @param int $userId The ID of the User entity that this Permission entity should be associated with.
     * @return $this Returns itself to allow for a fluent interface.
     */
    public function setUserId($userId = null)
    {
        if (null !== $userId) {
            $userId = (int)$userId;
        }
        $this->userId = $userId;
        return $this;
    }

    /**
     * Get Resource ID
     *
     * Gets the ID of the Resource entity that this Permission entity is associated with.
     *
     * @return int The ID of the Resource entity that this Permission entity is associated with.
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * Set Resource ID
     *
     * Sets the ID of the Resource entity that this Permission entity should be associated with.
     *
     * @param int $resourceId The ID of the Resource entity that this Permission entity should be associated with.
     * @return $this Returns itself to allow for a fluent interface.
     */
    public function setResourceId($resourceId = null)
    {
        if (null !== $resourceId) {
            $resourceId = (int)$resourceId;
        }
        $this->resourceId = $resourceId;
        return $this;
    }

    /**
     * Get Privilege ID
     *
     * Gets the ID of the Privilege entity that this Permission entity is associated with.
     *
     * @return int The ID of the Privilege entity that this Permission entity is associated with.
     */
    public function getPrivilegeId()
    {
        return $this->privilegeId;
    }

    /**
     * Set Privilege ID
     *
     * Sets the ID of the Privilege entity that this Permission entity should be associated with.
     *
     * @param int $privilegeId The ID of the Privilege entity that this Permission entity should be associated with.
     * @return $this Returns itself to allow for a fluent interface.
     */
    public function setPrivilegeId($privilegeId = null)
    {
        if (null !== $privilegeId) {
            $privilegeId = (int)$privilegeId;
        }
        $this->privilegeId = $privilegeId;
        return $this;
    }

// Getter and setters for properties representing representing associations with other entities.

    /**
     * Get Role
     *
     * Gets the Role entity that this Permission entity is associated with.
     *
     * @return Role The Role entity that this Permission entity is associated with.
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set Role
     *
     * Sets the Role entity that this Permission entity should be associated with.
     *
     * @param Role $role The Role entity that this Permission entity should be associated with.
     * @return $this Returns itself to allow for a fluent interface.
     */
    public function setRole(Role $role)
    {
        $role->addPermission($this);
        $this->role = $role;
        return $this;
    }
}