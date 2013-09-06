<?php
/**
 * Permission
 *
 * This is the permission entity used to represent permissions.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Permission
 *
 * This is the permission entity used to represent permissions.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\Service\Permission")
 * @ORM\Table(name="permission")
 */
class Permission extends AbstractPermission
{
}
