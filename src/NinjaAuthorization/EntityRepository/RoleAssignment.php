<?php
/**
 * Role Assignment
 *
 * Entity repository for the role assignment entity.
 *
 * @package NinjaAuthorization\EntityRepository
 * @filesource
 */

namespace NinjaAuthorization\EntityRepository;

use InvalidArgumentException;
use NinjaAuthorization\Entity\RoleAssignment as RoleAssignmentEntity;
use NinjaServiceLayer\EntityRepository\AbstractNeverDeletedEntityRepository;

/**
 * Role Assignment
 *
 * Entity repository for the role assignment entity.
 *
 * @package NinjaAuthorization\EntityRepository
 */
class RoleAssignment extends AbstractNeverDeletedEntityRepository
{

    /**
     * Get Not Deleted By User ID
     *
     * Get all of the role assignments for the specified user that are not deleted.
     *
     * @throws InvalidArgumentException If an invalid user ID is provided.
     * @param int $userId The ID of the user.
     * @return RoleAssignmentEntity[] The role assignments.
     */
    public function getNotDeletedByUserId($userId)
    {

        // Cleanse params.
        $userId = (int)$userId;
        if (0 === $userId) {
            throw new InvalidArgumentException('An invalid user ID was provided.');
        }

        // Return the results.
        return $this->findBy(
            array(
                'user' => $userId,
                'deleted' => 0,
            )
        );
    }
}
