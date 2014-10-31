<?php
/**
 * Role Assignment Factory
 *
 * Factory for the role assignment entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use NinjaServiceLayer\Entity\FactoryInterface;

/**
 * Role Assignment Factory
 *
 * Factory for the role assignment entity.
 *
 * @package NinjaAuthorization\Entity
 */
class RoleAssignmentFactory implements FactoryInterface
{

  /**
   * Create Entity
   *
   * Creates the role assignment entity
   *
   * @return AbstractRoleAssignment The role assignment entity.
   */
  public function createEntity()
  {
    return new RoleAssignment;
  }
}
