<?php
/**
 * Abstract Entity
 *
 * This is the abstract entity that all entities in this module should extend.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use NinjaServiceLayer\Entity\AbstractEntity as NinjaAbstractEntity;

/**
 * Abstract Entity
 *
 * This is the abstract entity that all entities in this module should extend.
 *
 * @package NinjaAuthorization\Entity
 */
abstract class AbstractEntity extends NinjaAbstractEntity
{

    /**
     * ID
     *
     * This is the ID of this entity.
     *
     * @var int The ID of this entity.
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", unique=true)
     */
    protected $id;

    /**
     * Deleted
     *
     * Whether or not this entity is deleted. True means it is deleted and false means it is not deleted.
     *
     * @var bool Whether or not this entity is deleted. True means it is deleted and false means it is not deleted.
     * @ORM\Column(type="boolean")
     */
    protected $deleted = false;

    /**
     * Date Added
     *
     * This is the date this entity was added to the database.
     *
     * @var DateTime The date this entity was added to the database.
     * @ORM\Column(type="datetime", name="date_added")
     */
    protected $dateAdded;

    /**
     * Date Modified
     *
     * This is the date this entity was last modified.
     *
     * @var DateTime The date this entity was last modified.
     * @ORM\Column(type="datetime", name="date_modified")
     */
    protected $dateModified;

    /**
     * Get ID
     *
     * Gets the ID of this entity.
     *
     * @return int The ID of this entity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ID
     *
     * Sets the ID of this entity.
     *
     * @param int $id The ID of this entity.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setId($id)
    {
        $this->id = (int)$id;
        return $this;
    }

    /**
     * Get Deleted
     *
     * Gets whether or not this entity is deleted. True means it is deleted and false means it is not deleted.
     *
     * @return bool Whether or not this entity is deleted. True means it is deleted and false means it is not deleted.
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set Deleted
     *
     * Sets whether or not this entity is deleted. True means it is deleted and false means it is not deleted.
     *
     * @param bool $deleted Whether or not this entity is deleted. True means it is deleted and false means it is not deleted.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setDeleted($deleted = false)
    {
        $this->deleted = (bool)$deleted;
        return $this;
    }

    /**
     * Get Date Added
     *
     * Gets the date this entity was added to the database.
     *
     * @return DateTime The date this entity was added to the database.
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set Date Added
     *
     * Sets the date this entity was added to the database.
     *
     * @param DateTime $dateAdded The date this entity was added to the database.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setDateAdded(DateTime $dateAdded = null)
    {
        if (null === $dateAdded) {
            $dateAdded = new DateTime();
        }
        $this->dateAdded = $dateAdded;
        return $this;
    }

    /**
     * Get Date Modified
     *
     * Gets the date this entity was last modified.
     *
     * @return DateTime The date this entity was last modified.
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * Set Date Modified
     *
     * Sets the date this entity was last modified.
     *
     * @param DateTime $dateModified The date this entity was last modified.
     * @return self Returns itself to allow for a fluent interface.
     */
    public function setDateModified(DateTime $dateModified = null)
    {
        if (null === $dateModified) {
            $dateModified = new DateTime();
        }
        $this->dateModified = $dateModified;
        return $this;
    }
}
