<?php
/**
 * Resource
 *
 * This is the permission entity used to represent permissions.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resource
 *
 * This is the permission entity used to represent permissions.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\Service\Resource")
 * @ORM\Table(name="resource")
 */
class Resource extends AbstractResource
{
}
