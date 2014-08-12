<?php
/**
 * Abstract Resource
 *
 * This is the abstract resource entity which should be extended by the actual resource entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use NinjaServiceLayer\Entity\AbstractNeverDeletedEntity as AbstractEntity;

/**
 * Abstract Resource
 *
 * This is the abstract resource entity which should be extended by the actual resource entity.
 *
 * @package NinjaAuthorization\Entity
 */
abstract class AbstractResource extends AbstractEntity
{

    /**
     * Name
     *
     * The name of this resource.
     *
     * @var string The name of this resource.
     * @ORM\Column(length=45, unique=true)
     */
    protected $name;

    /**
     * Permissions
     *
     * The permissions that this resource is associated with.
     *
     * @var AbstractPermission[] The permissions that this resource is associated with.
     * @ORM\OneToMany(targetEntity="NinjaAuthorization\Entity\Permission", mappedBy="resource")
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
     * Gets the name of this resource.
     *
     * @return string The name of this resource.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Name
     *
     * Sets the name of this resource.
     *
     * @param string $name The name of this resource.
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
     * Gets the permissions associated with this resource.
     *
     * @return AbstractPermission[] The permissions associated with this resource.
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Add Permission
     *
     * Adds a permission to this resource.
     *
     * @param AbstractPermission $permission The permission to add to this resource.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function addPermission(AbstractPermission $permission)
    {
        $this->getPermissions()->add($permission);
        return $this;
    }
}
