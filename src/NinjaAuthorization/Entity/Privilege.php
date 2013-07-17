<?php
/**
 * Privilege
 *
 * This is the file for the Privilege entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Privilege
 *
 * This is the Privilege entity.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\Service\Privilege")
 */
class Privilege extends AbstractEntity
{

// Properties representing columns in the corresponding database table.

    /**
     * Name
     *
     * The name of this Privilege entity.
     *
     * @var string The name of this Privilege entity.
     * @ORM\Column(length=45, unique=true)
     */
    protected $name;

// Properties representing associations with other entities.

    /**
     * Permissions
     *
     * The Permission entities that this Privilege entity is associated with.
     *
     * @var Permission[] The Permission entities that this Privilege entity is associated with.
     * @ORM\OneToMany(targetEntity="Permission", mappedBy="privilege")
     */
    protected $permissions;

    /**
     * Construct
     *
     * The constructor for this Privilege entity. This is normally used to setup array collections for *ToMany
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
     * Gets the name of this Privilege entity.
     *
     * @return string The name of this privilege.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * Sets what the name of this Privilege entity should be.
     *
     * @param string $name The name to set for this Privilege entity.
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
     * Gets the Permission entities associated with this Privilege entity.
     *
     * @return Permission[] The Permission entities associated with this Privilege entity
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Add Permission
     *
     * Adds a Permission entity to this Privilege entity.
     *
     * @param Permission $permission The Permission entity to add to this Privilege entity.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function addPermission(Permission $permission)
    {
        $permission->setPrivilegeId($this->getId());
        $permission->setPrivilege($this);
        $this->permissions[] = $permission;
        return $this;
    }
}