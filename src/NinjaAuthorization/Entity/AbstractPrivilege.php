<?php
/**
 * Abstract Privilege
 *
 * This is the abstract privilege entity which should be extended by the actual privilege entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Abstract Privilege
 *
 * This is the abstract privilege entity which should be extended by the actual privilege entity.
 *
 * @package NinjaAuthorization\Entity
 */
abstract class AbstractPrivilege extends AbstractEntity
{

    /**
     * Name
     *
     * The name of this privilege.
     *
     * @var string The name of this privilege.
     * @ORM\Column(length=45, unique=true)
     */
    protected $name;

    /**
     * Permissions
     *
     * The permissions that this privilege is associated with.
     *
     * @var AbstractPermission[] The permissions that this privilege is associated with.
     * @ORM\OneToMany(targetEntity="NinjaAuthorization\Entity\Permission", mappedBy="privilege")
     */
    protected $permissions;

    /**
     * Construct
     *
     * The constructor for this entity. This is normally used to setup array collections for *ToMany associations.
     */
    public function __construct()
    {
        $this->permissions = new ArrayCollection();
    }

    /**
     * Get Name
     *
     * Gets the name of this privilege.
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
     * Sets the name of this privilege.
     *
     * @param string $name The name of this privilege.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setName($name)
    {
        $this->name = (string)$name;
        return $this;
    }

    /**
     * Get Permissions
     *
     * Gets the permissions associated with this privilege.
     *
     * @return AbstractPermission[] The permissions associated with this privilege.
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Add Permission
     *
     * Adds a permission to this privilege.
     *
     * @param AbstractPermission $permission The permission to add to this privilege.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function addPermission(AbstractPermission $permission)
    {
        $this->permissions[] = $permission;
        return $this;
    }
}
