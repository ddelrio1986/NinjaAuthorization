<?php
/**
 * Role
 *
 * Role entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 *
 * Role entity.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\EntityRepository\Role")
 * @ORM\Table(name="role")
 */
class Role extends AbstractRole
{
}
