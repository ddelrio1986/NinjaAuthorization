<?php
/**
 * Role
 *
 * This is the file for the Role entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * This is the Role entity.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\Service\Role")
 */
class Role extends AbstractEntity
{

// Properties representing columns in the corresponding database table.

    /**
     * Name
     *
     * The name of this Role entity.
     *
     * @var string The name of this Role entity.
     * @ORM\Column(length=25, unique=true)
     */
    protected $name;

    /**
     * Parent Role ID
     *
     * The ID of the Role entity that is the parent of this Role entity.
     *
     * @var null|int The ID of the Role entity that is the parent of this Role entity.
     * @ORM\Column(type="integer", name="parent_role_id", nullable=true)
     */
    protected $parentRoleId;

// Properties representing associations with other entities.

    /**
     * Role Assignments
     * 
     * The RoleAssignment entities that this Role entity is associated with.
     * 
     * @var RoleAssignment[] The RoleAssignment entities that this Role entity is associated with.
     * @ORM\OneToMany(targetEntity="RoleAssignment", mappedBy="role")
     */
    protected $roleAssignments;
    
    /**
     * Permissions
     * 
     * The Permission entities that this Role entity is associated with.
     * 
     * @var Permission[] The Permission entities that this Role entity is associated with.
     * @ORM\OneToMany(targetEntity="Permission", mappedBy="role")
     */
    protected $permissions;

    /**
     * Parent
     *
     * The Role entity that is the parent of this Role entity.
     *
     * @var null|Role The Role entity that is the parent of this Role entity
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="children")
     */
    protected $parent;

    /**
     * Children
     *
     * The Role entities that this Role entity is a parent of.
     *
     * @var Role[] The Role entities that this Role entity is a parent of.
     * @ORM\OneToMany(targetEntity="Role", mappedBy="parent")
     */
    protected $children;

    /**
     * Construct
     *
     * The constructor for this Role entity. This is normally used to setup array collections for *ToMany association.
     */
    public function __construct()
    {
        $this->children = new ArrayCollection;
    }

// Getters and setters for properties representing columns in the corresponding database table.

    /**
     * Get Name
     *
     * Gets the name of this Role entity.
     *
     * @return string The name of this Role entity.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * Sets the name of this Role entity.
     *
     * @param string $name The name to set for this Role entity.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setName($name)
    {
        $this->name = (string)$name;
        return $this;
    }

    /**
     * Get Parent Role ID
     *
     * Gets the ID of the Role entity that is the parent of this Role entity.
     *
     * @return null|int The ID of the Role entity that is the parent of this Role entity.
     */
    public function getParentRoleId()
    {
        return $this->parentRoleId;
    }

    /**
     * Set Parent Role ID
     *
     * Sets the ID of the Role entity that is the parent of this Role entity.
     *
     * @param null|int $parentRoleId The ID of the Role entity that is the parent of this Role entity.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setParentRoleId($parentRoleId = null)
    {
        if (null !== $parentRoleId) {
            $parentRoleId = (int)$parentRoleId;
        }
        $this->parentRoleId = $parentRoleId;
        return $this;
    }

// Getters and setters for properties representing associations with other entities.

    /**
     * Get Role Assignments
     *
     * Gets the RoleAssignment entities associated with this Role entity.
     *
     * @return RoleAssignment[] The RoleAssignment entities associated with this Role entity.
     */
    public function getRoleAssignments()
    {
        return $this->roleAssignments;
    }
    
    /**
     * Add Role Assignment
     *
     * Adds a RoleAssignment entity for this Role entity.
     *
     * @param RoleAssignment $roleAssignment The RoleAssignment entity to add for this Role entity
     * @return self Returns itself to allow for a fluent interface.
     */
    public function addRoleAssignment(RoleAssignment $roleAssignment)
    {
        $roleAssignment->setRoleId($this->getId());
        $roleAssignment->setRole($this);
        $this->roleAssignment[] = $roleAssignment;
        return $this;
    }
    
    /**
     * Get Permissions
     *
     * Gets the Permission entities associated with this Role entity.
     *
     * @return Permission[] The Permission entities associated with this Role entity.
     */
    public function getPermissions()
    {
        return $this->permissions;
    }
    
    /**
     * Add Permission
     *
     * Adds a Permission entity for this Role entity.
     *
     * @param Permission $permission The Permission entity to add for this Role entity
     * @return self Returns itself to allow for a fluent interface.
     */
    public function addPermission(Permission $permission)
    {
        $permission->setRoleId($this->getId());
        $permission->setRole($this);
        $this->permissions[] = $permission;
        return $this;
    }
    
    /**
     * Get Parent
     *
     * Gets the Role entity that is the parent of this Role entity.
     *
     * @return null|Role The Role entity that is the parent of this Role entity.
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set Parent
     *
     * Sets the Role entity that is the parent of this Role entity.
     *
     * @param null|Role $parent The Role entity that is the parent of this Role entity.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setParent(Role $parent = null)
    {
        if (null !== $parent) {
            $parent->addChild($this);
        }
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get Children
     *
     * Gets the children Role entities associated with this Role entity.
     *
     * @return Role[] The children Role entities associated with this Role entity.
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add Child
     *
     * Adds a child Role entity for this Role entity.
     *
     * @param Role $child The child Role entity to add for this Role entity
     * @return self Returns itself to allow for method chaining.
     */
    public function addChild(Role $child)
    {
        $child->setParentId($this->getId());
        $child->setParent($this);
        $this->children[] = $child;
        return $this;
    }
}