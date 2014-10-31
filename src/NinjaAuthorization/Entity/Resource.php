<?php
/**
 * Resource
 *
 * Resource entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resource
 *
 * Resource entity.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\EntityRepository\Resource")
 * @ORM\Table(name="resource")
 */
class Resource extends AbstractResource
{
}
