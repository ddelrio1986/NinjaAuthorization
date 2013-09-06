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
 * @ORM\Table(name="role")
 */
class Role extends AbstractRole
{
}
