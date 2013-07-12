<?php
/**
 * Abstract Entity
 *
 * This is the abstract entity that all entities should extend.
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
 * This is the abstract entity that all entities should extend.
 *
 * @package NinjaAuthorization\Entity
 */
abstract class AbstractEntity extends NinjaAbstractEntity
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="id", unique=true)
     */
    protected $id;

    /**
     * @ORM\Column(type="boolean", name="deleted")
     */
    protected $deleted = false;

    /**
     * @ORM\Column(type="datetime", name="date_added")
     */
    protected $dateAdded;

    /**
     * @ORM\Column(type="datetime", name="date_modified")
     */
    protected $dateModified;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = (int)$id;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     * @return self
     */
    public function setDeleted($deleted = false)
    {
        $this->deleted = (bool)$deleted;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * @param DateTime $dateAdded
     * @return self
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
     * @return DateTime
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * @param DateTime $dateModified
     * @return self
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