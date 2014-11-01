<?php
/**
 * Abstract Role
 *
 * Base class for a role entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use NinjaServiceLayer\Entity\AbstractWithIdAndDatesEntity;

/**
 * Abstract Role
 *
 * Base class for a role entity.
 *
 * @package NinjaAuthorization\Entity
 */
abstract class AbstractRole extends AbstractWithIdAndDatesEntity
{

  /**
   * Name
   *
   * The name of this role.
   *
   * @var string The name of this role.
   * @ORM\Column(length=25, unique=true)
   */
  protected $name;

  /**
   * Role Assignments
   *
   * The role assignments that this role is associated with.
   *
   * @var AbstractRoleAssignment[] The role assignments that this role is associated with.
   * @ORM\OneToMany(targetEntity="NinjaAuthorization\Entity\RoleAssignment", mappedBy="role")
   */
  protected $roleAssignments;

  /**
   * Permissions
   *
   * The permissions that this role is associated with.
   *
   * @var AbstractPermission[] The permissions that this role is associated with.
   * @ORM\OneToMany(targetEntity="NinjaAuthorization\Entity\Permission", mappedBy="role")
   */
  protected $permissions;

  /**
   * Parent
   *
   * The role that is the parent of this role.
   *
   * @var null|AbstractRole The role that is the parent of this role.
   * @ORM\ManyToOne(targetEntity="NinjaAuthorization\Entity\Role", inversedBy="children")
   * @ORM\JoinColumn(name="parent_role_id", referencedColumnName="id")
   */
  protected $parent;

  /**
   * Children
   *
   * The roles that this role is a parent of.
   *
   * @var AbstractRole[] The roles that this role is a parent of.
   * @ORM\OneToMany(targetEntity="NinjaAuthorization\Entity\Role", mappedBy="parent")
   */
  protected $children;

  /**
   * Construct
   *
   * The constructor for this entity. This is normally used to setup array collections for *ToMany associations.
   */
  public function __construct()
  {
    $this->roleAssignments = new ArrayCollection;
    $this->permissions = new ArrayCollection;
    $this->children = new ArrayCollection;
  }

  /**
   * Get Name
   *
   * Gets the name of this role.
   *
   * @return string The name of this role.
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set Name
   *
   * Sets the name of this role.
   *
   * @param string $name The name of this role.
   * @return self Returns itself to allow for method chaining.
   */
  public function setName($name)
  {
    $this->name = (string)$name;
    return $this;
  }

  /**
   * Get Role Assignments
   *
   * Gets the role assignments associated with this role.
   *
   * @return AbstractRoleAssignment[] The role assignments associated with this role.
   */
  public function getRoleAssignments()
  {
    return $this->roleAssignments;
  }

  /**
   * Add Role Assignment
   *
   * Adds a role assignment for this role.
   *
   * @param AbstractRoleAssignment $roleAssignment The role assignments to add to this role.
   * @return self Returns itself to allow for method chaining.
   */
  public function addRoleAssignment(AbstractRoleAssignment $roleAssignment)
  {
    $this->getRoleAssignments()->add($roleAssignment);
    return $this;
  }

  /**
   * Get Permissions
   *
   * Gets the permissions associated with this role.
   *
   * @return AbstractPermission[] The permissions associated with this role.
   */
  public function getPermissions()
  {
    return $this->permissions;
  }

  /**
   * Add Permission
   *
   * Adds a permission to this role.
   *
   * @param AbstractPermission $permission The permission to add to this role.
   * @return self Returns itself to allow for method chaining.
   */
  public function addPermission(AbstractPermission $permission)
  {
    $this->getPermissions()->add($permission);
    return $this;
  }

  /**
   * Get Parent
   *
   * Gets the role that is the parent of this role.
   *
   * @return null|AbstractRole The role that is the parent of this role.
   */
  public function getParent()
  {
    return $this->parent;
  }

  /**
   * Set Parent
   *
   * Sets the role that is the parent of this role.
   *
   * @param null|AbstractRole $parent The role that is the parent of this role.
   * @return self Returns itself to allow for method chaining.
   */
  public function setParent(AbstractRole $parent = null)
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
   * Gets the children roles of this role.
   *
   * @return AbstractRole[] The children roles of this role.
   */
  public function getChildren()
  {
    return $this->children;
  }

  /**
   * Add Child
   *
   * Adds a child role to this role.
   *
   * @param AbstractRole $child The child role to add to this role.
   * @return self Returns itself to allow for method chaining.
   */
  public function addChild(AbstractRole $child)
  {
    $this->getChildren()->add($child);
    return $this;
  }
}
