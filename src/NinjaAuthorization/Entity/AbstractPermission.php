<?php
/**
 * Abstract Permission
 *
 * This is the abstract permission entity which the actual permission entity should extend.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abstract Permission
 *
 * This is the abstract permission entity which the actual permission entity should extend.
 *
 * @package NinjaAuthorization\Entity
 */
abstract class AbstractPermission extends AbstractEntity
{

    /**
     * Allow
     *
     * Whether or not the permission is for allowing something or denying something. True means it is for allowing
     * something and false means it is for denying something.
     *
     * @var bool Whether or not the permission is for allowing something or denying something. True means it is for allowing something and false means it is for denying something.
     * @ORM\Column(type="boolean")
     */
    protected $allow = true;

    /**
     * Role
     *
     * The role that this permission is for if it is for a role.
     *
     * @var null|Role The role that this permission is for if it is for a role.
     * @ORM\ManyToOne(targetEntity="NinjaAuthorization\Entity\Role", inversedBy="permissions")
     */
    protected $role;

    /**
     * User
     *
     * The user that this permission is for if it is for a user.
     *
     * @var null|UserInterface The user that this permission is for if it is for a user.
     * @ORM\ManyToOne(targetEntity="NinjaAuthorization\Entity\UserInterface", inversedBy="permissions")
     */
    protected $user;

    /**
     * Resource
     *
     * The resource that this permission is for if it is for a resource.
     *
     * @var null|AbstractResource The resource that this permission is for if it is for a resource.
     * @ORM\ManyToOne(targetEntity="NinjaAuthorization\Entity\Resource", inversedBy="permissions")
     */
    protected $resource;

    /**
     * Privilege
     *
     * The privilege that this permission is for if it is for a privilege.
     *
     * @var null|AbstractPrivilege The privilege that this permission is for if it is for a privilege.
     * @ORM\ManyToOne(targetEntity="NinjaAuthorization\Entity\Privilege", inversedBy="permissions")
     */
    protected $privilege;

    /**
     * Get Allow
     *
     * Gets whether this permission is for allowing something or denying something. True means it is for allowing
     * something and false means it is for denying something.
     *
     * @return bool Whether this permission is for allowing something or denying something. True means it is for allowing something and false means it is for denying something.
     */
    public function getAllow()
    {
        return $this->allow;
    }

    /**
     * Set Allow
     *
     * Sets whether this permission is for allowing something or denying something. True means it is for allowing
     * something and false means it is for denying something.
     *
     * @param bool $allow Whether this permission is for allowing something or denying something. True means it is for allowing something and false means it is for denying something.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setAllow($allow = true)
    {
        $this->allow = (bool)$allow;
        return $this;
    }

    /**
     * Get Role
     *
     * Gets the role that this permission is for if it is for a role.
     *
     * @return null|AbstractRole The role that this permission is for if it is for a role.
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set Role
     *
     * Sets the role that this permission is for if it is for a role.
     *
     * @param null|AbstractRole $role The role that this permission is for if it is for a role.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setRole(AbstractRole $role = null)
    {
        if (null !== $role) {
            $role->addPermission($this);
        }
        $this->role = $role;
        return $this;
    }

    /**
     * Get User
     *
     * Gets the user that this permission is for if it is for a user.
     *
     * @return null|UserInterface The user that this permission is for if it is for a user.
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set User
     *
     * Sets the user that this permission is for if it is for a user.
     *
     * @param null|UserInterface $user The user that this permission is for if it is for a user.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setUser(UserInterface $user = null)
    {
        if (null !== $user) {
            $user->addPermission($this);
        }
        $this->user = $user;
        return $this;
    }

    /**
     * Get Resource
     *
     * Gets the resource that this permission is for if it is for a resource.
     *
     * @return null|AbstractResource The resource that this permission is for if it is for a resource.
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Set Resource
     *
     * Sets the resource that this permission is for if it is for a resource.
     *
     * @param null|AbstractResource $resource The resource that this permission is for if it is for a resource.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setResource(AbstractResource $resource = null)
    {
        if (null !== $resource) {
            $resource->addPermission($this);
        }
        $this->resource = $resource;
        return $this;
    }

    /**
     * Get Privilege
     *
     * Gets the privilege that this permission is for if it is for a privilege.
     *
     * @return null|AbstractPrivilege The privilege that this permission is for if it is for a privilege.
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }

    /**
     * Set Privilege
     *
     * Sets the privilege that this permission is for if it is for a privilege.
     *
     * @param null|AbstractPrivilege $privilege The privilege that this permission is for if it is for a privilege.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setPrivilege(AbstractPrivilege $privilege = null)
    {
        if (null !== $privilege) {
            $privilege->addPermission($this);
        }
        $this->privilege = $privilege;
        return $this;
    }
}
