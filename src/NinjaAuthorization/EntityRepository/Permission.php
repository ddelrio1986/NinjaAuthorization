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
use NinjaServiceLayer\EntityRepository\AbstractNeverDeletedEntityRepository;

/**
 * Permission
 *
 * Entity repository for the permission entity.
 *
 * @package NinjaAuthorization\EntityRepository
 */
class Permission extends AbstractNeverDeletedEntityRepository
{

    /**
     * Get Not Deleted By User ID
     *
     * Get the not deleted permissions tied to the specified user ID.
     *
     * @throws InvalidArgumentException If an invalid user ID is provided.
     * @param int $userId The user ID to get permissions for.
     * @return AbstractPermission[] The permissions for the specified user.
     */
    public function getNotDeletedByUserId($userId)
    {

        // Cleanse params.
        $userId = (int)$userId;
        if (0 === $userId) {
            throw new InvalidArgumentException('Invalid user ID provided.');
        }

        // Return the results.
        return $this->findBy(array(
            'user' => $userId,
            'deleted' => 0,
        ));
    }

    /**
     * Get Not Deleted Role Permissions
     *
     * Get the not deleted permissions that are for a specific role and not for a specific user.
     *
     * @return PermissionEntity[] The not deleted permissions that are for a specific role and not for a specific user.
     */
    public function getNotDeletedRolePermissions()
    {

        // Return the results.
        return $this->findBy(array(
            'user' => null,
            'deleted' => 0,
        ));
    }
}
