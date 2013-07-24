<?php
/**
 * Resource
 *
 * This is the file for the Resource entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Resource
 *
 * This is the Resource entity.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\Service\Resource")
 * @ORM\Table(name="resource")
 */
class Resource extends AbstractEntity
{

// Properties representing columns in the corresponding database table.

    /**
     * Name
     *
     * The name of this Resource entity.
     *
     * @var string The name of this Resource entity.
     * @ORM\Column(length=45, unique=true)
     */
    protected $name;

// Properties representing associations with other entities.

    /**
     * Permissions
     *
     * The Permission entities that this Resource entity is associated with.
     *
     * @var Permission[]
     * @ORM\OneToMany(targetEntity="Permission", mappedBy="resource")
     */
    protected $permissions;

    /**
     * Construct
     *
     * The constructor for this Resource entity. This is normally used to setup array collections for *ToMany
     * associations.
     */
    public function __construct()
    {
        $this->permissions = new ArrayCollection();
    }

// Getters and setters for properties representing columns in the corresponding database table.

    /**
     * Get Name
     *
     * Gets the name of this Resource entity.
     *
     * @return string The name of this Resource entity.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * Sets what the name of this Resource entity should be.
     *
     * @param string $name The name to set for this Resource entity.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setName($name)
    {
        $this->name = (string)$name;
        return $this;
    }

// Getters and setters for properties representing associations with other entities.

    /**
     * Get Permissions
     *
     * Gets the Permission entities associated with this Resource entity.
     *
     * @return Permission[] The Permission entities associated with this Resource entity.
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Add Permission
     *
     * Adds a Permission entity to this Resource entity.
     *
     * @param Permission $permission The Permission entity to add to this Resource entity.
     * @return self Returns itself to allow for method chaining.
     */
    public function addPermission(Permission $permission)
    {
        $permission->setResourceId($this->getId());
        $permission->setResource($this);
        $this->permissions[] = $permission;
        return $this;
    }
}