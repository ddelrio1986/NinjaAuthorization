<?php
/**
 * RoleAssignment
 *
 * This is the permission entity used to represent permissions.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoleAssignment
 *
 * This is the permission entity used to represent permissions.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\Service\RoleAssignment")
 * @ORM\Table(name="role_assignment")
 */
class RoleAssignment extends AbstractRoleAssignment
{
}
