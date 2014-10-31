<?php
/**
 * Role Assignment
 *
 * Role assignment entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role Assignment
 *
 * Role assignment entity.
 *
 * @package NinjaAuthorization\Entity
 * @ORM\Entity(repositoryClass="NinjaAuthorization\EntityRepository\RoleAssignment")
 * @ORM\Table(name="role_assignment")
 */
class RoleAssignment extends AbstractRoleAssignment
{
}
