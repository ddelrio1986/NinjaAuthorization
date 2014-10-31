<?php
/**
 * Permission
 *
 * Permission entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permission
 *
 * Permission entity.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\EntityRepository\Permission")
 * @ORM\Table(name="permission")
 */
class Permission extends AbstractPermission
{
}
