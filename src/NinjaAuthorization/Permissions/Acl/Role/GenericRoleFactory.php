<?php
/**
 * Generic Role Factory
 *
 * Factory used to create an instance of ZF's generic role class.
 *
 * @package NinjaAuthorization\Permissions\Acl\Role
 * @filesource
 */

namespace NinjaAuthorization\Permissions\Acl\Role;

use InvalidArgumentException;
use Zend\Permissions\Acl\Role\GenericRole;

/**
 * Generic Role Factory
 *
 * Factory used to create an instance of ZF's generic role class.
 *
 * @package NinjaAuthorization\Permissions\Acl\Role
 */
class GenericRoleFactory
{

  /**
   * Create Service
   *
   * Creates an instance of ZF's generic role class.
   *
   * @throws InvalidArgumentException If an invalid role ID was provided.
   * @param string $roleId The ID of the role.
   * @return GenericRole An instance of ZF's generic role class.
   */
  public function createService($roleId)
  {

    // Cleanse input.
    $roleId = trim((string)$roleId);
    if ("" === $roleId) {
      throw new InvalidArgumentException("An invalid role ID was provided.");
    }

    return new GenericRole($roleId);
  }
}
