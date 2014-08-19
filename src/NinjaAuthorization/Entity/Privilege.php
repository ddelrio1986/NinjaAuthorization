<?php
/**
 * Privilege
 *
 * This is the permission entity used to represent permissions.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Privilege
 *
 * This is the permission entity used to represent permissions.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\EntityRepository\Privilege")
 * @ORM\Table(name="privilege")
 */
class Privilege extends AbstractPrivilege
{
}
