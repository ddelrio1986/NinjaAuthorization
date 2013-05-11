<?php
/**
 * Permission Entity
 *
 * An entity that represents a permission.
 *
 * @author Daniel Del Rio <ddelrio1986@gmail.com>
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;
use NinjaServiceLayer\Entity\AbstractEntity;

/**
 * Permission Entity
 *
 * An entity that represents a permission.
 *
 * @author Daniel Del Rio <ddelrio1986@gmail.com>
 * @package NinjaAuthorization\Entity
 * @ORM\Entity
 * @ORM\Table(name=permission)
 */
class Permission extends AbstractEntity
{

    /**
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @var int The ID of the permission.
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="`id`")
     */
    protected $id;

    /**
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @var int The ID of the role that the permission is for. This could be null if the permission is for a user and not a role.
     * @ORM\Column(type="integer",name="`role_id`",nullable=true)
     */
    protected $roleId;

    /**
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @var int The ID of the user that the permission is for. This could be null if the permission is for a role and not a user.
     * @ORM\Column(type="integer",name="`user_id`",nullable=true)
     */
    protected $userId;

    /**
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @var int The ID of the resource that the permission is for. This could be null if the permission applies to all resources.
     * @ORM\Column(type="integer",name="`resource_id`",nullable=true)
     */
    protected $resourceId;

    /**
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @var int The ID of the privilege that the permission is for. This could be null if the permission is for all privileges. It would only be for all privileges of a specific resource if there is a valid resource ID set for this permission.
     * @ORM\Column(type="integer",name="`privilege_id`",nullable=true)
     */
    protected $privilegeId;

    /**
     * Get ID
     *
     * Gets the ID of this permission.
     *
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @return null|int The ID of this permission. This should only be null if this entity hasn't been populated yet.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ID
     *
     * Sets the ID of this permission.
     *
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @param null|int $id The ID of this permission. This should only be null when resetting the entity or when initially instanced.
     * @return self Returns itself to allow for method chaining.
     */
    public function setId($id)
    {
        $id = (int)$id;
        if (0 !== $id) {
            $this->id = $id;
        }
        return $this;
    }

    /**
     * Get Role ID
     *
     * Get the role ID that this permission is for. This could be null if this permission is for a user instead of a
     * role.
     *
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @return null|int $roleId The ID of the role that this permission is for. This could be null if this permission is for a user instead of a role.
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set Role ID
     *
     * Set the role ID that this permission is for. This could be null if this permission is for a user instead of a
     * role.
     *
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @param null|int $roleId The ID of the role that this permission is for. This could be null if this permission is for a user instead of a role.
     * @return self Returns itself to allow for method chaining.
     */
    public function setRoleId($roleId)
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
     * Get the user ID that this permission is for. This could be null if this permission is for a role instead of a
     * user.
     *
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @return null|int $userId The ID of the user that this permission is for. This could be null if this permission is for a role instead of a user.
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set User ID
     *
     * Set the user ID that this permission is for. This could be null if this permission is for a role instead of a
     * user.
     *
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @param null|int $userId The ID of the user that this permission is for. This could be null if this permission is for a role instead of a user.
     * @return self Returns itself to allow for method chaining.
     */
    public function setUserId($userId)
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
     * Get the resource ID that this permission is for. This could be null if this permission is for all resources.
     *
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @return null|int $resourceId The ID of the resource that this permission is for. This could be null if this permission is for all resources.
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * Set Resource ID
     *
     * Set the resource ID that this permission is for. This could be null if this permission is for all resources.
     *
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @param null|int $resourceId The ID of the resource that this permission is for. This could be null if this permission is for all resources.
     * @return self Returns itself to allow for method chaining.
     */
    public function setResourceId($resourceId)
    {
        if (null !== $resourceId) {
            $resourceId = (int)$resourceId;
        }
        $this->userId = $userId;
        return $this;
    }

    /**
     * Get Privilege ID
     *
     * Get the ID of the privilege that the permission is for. This could be null if the permission is for all
     * privileges. It would only be for all privileges of a specific resource if there is a valid resource ID set for
     * this permission.
     *
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @return null|int The ID of the privilege that the permission is for. This could be null if the permission is for all privileges. It would only be for all privileges of a specific resource if there is a valid resource ID set for this permission.
     */
    public function getPrivilegeId()
    {
        return $this->privilegeId;
    }

    /**
     * Set Privilege ID
     *
     * Set the ID of the privilege that the permission is for. This could be null if the permission is for all
     * privileges. It would only be for all privileges of a specific resource if there is a valid resource ID set for
     * this permission.
     *
     * @author Daniel Del Rio <ddelrio1986@gmail.com>
     * @param null|int The ID of the privilege that the permission is for. This could be null if the permission is for all privileges. It would only be for all privileges of a specific resource if there is a valid resource ID set for this permission.
     * @return self Returns itself to allow for method chaining.
     */
    public function setPrivilegeId($privilegeId)
    {
        if (null !== $privilegeId) {
            $privilegeId = (int)$privilegeId;
        }
        $this->privilegeId = $privilegeId;
        return $this;
    }
}
