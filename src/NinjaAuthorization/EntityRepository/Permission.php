<?php
/**
 * Permission
 *
 * Entity repository for the permission entity.
 *
 * @package NinjaAuthorization\EntityRepository
 * @filesource
 */

namespace NinjaAuthorization\EntityRepository;

use InvalidArgumentException;
use NinjaAuthorization\Entity\Permission as PermissionEntity;
use NinjaServiceLayer\EntityRepository\AbstractEntityRepository;

/**
 * Permission
 *
 * Entity repository for the permission entity.
 *
 * @package NinjaAuthorization\EntityRepository
 */
class Permission extends AbstractEntityRepository
{

  /**
   * Get By User ID
   *
   * Gets the permissions tied to the specified user ID.
   *
   * @throws InvalidArgumentException If an invalid user ID is provided.
   * @param int $userId The user ID to get permissions for.
   * @return AbstractPermission[] The permissions for the specified user.
   */
  public function getByUserId($userId)
  {

    // Cleanse params.
    $userId = (int)$userId;
    if (0 === $userId)
      throw new InvalidArgumentException("Invalid user ID provided.");

    // Return the results.
    return $this->findBy(array(
      "user" => $userId,
    ));
  }

  /**
   * Get Role Permissions
   *
   * Get the permissions that are for a specific role and not for a specific user.
   *
   * @return PermissionEntity[] The permissions that are for a specific role and not for a specific user.
   */
  public function getRolePermissions()
  {

    // Return the results.
    return $this->findBy(array(
      "user" => null,
    ));
  }
}
