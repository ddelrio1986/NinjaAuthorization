<?php
/**
 * Privilege
 *
 * Privilege entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Privilege
 *
 * Privilege entity.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\EntityRepository\Privilege")
 * @ORM\Table(name="privilege")
 */
class Privilege extends AbstractPrivilege
{
}
