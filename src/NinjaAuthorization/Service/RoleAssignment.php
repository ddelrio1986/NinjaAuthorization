<?php
/**
 * Role Assignment
 *
 * This is the abstract role assignment service which should be extended by the actual role assignment service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use NinjaAuthorization\Entity\RoleAssignment as RoleAssignmentEntity;

/**
 * Role Assignment
 *
 * This is the abstract role assignment service which should be extended by the actual role assignment service.
 *
 * @package NinjaAuthorization\Service
 */
class RoleAssignment extends AbstractEntityService
{
    protected $entity = 'NinjaAuthorization\Entity\RoleAssignment';

    /**
     * Get Not Deleted By User ID
     *
     * Get all of the role assignments for the specified user that are not deleted.
     *
     * @param int $userId The ID of the user.
     * @return RoleAssignmentEntity[] The role assignments.
     */
    public function getNotDeletedByUserId($userId)
    {

        // Cleanse params.
        $userId = (int)$userId;
        if (0 === $userId) throw new \Exception('Invalid user ID provided.');

        // Build the query.
        $qb = $this->_em->createQueryBuilder();
        $qb->select('e')
            ->from($this->entity, 'e')
            ->join('e.user', 'u')
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->eq('e.deleted', ':deleted'),
                    $qb->expr()->eq('u.id', ':userId')
                )
            )
            ->setParameters(
                array(
                    'deleted' => 0,
                    'userId' => $userId,
                )
            );

        // Return the results.
        return $qb->getQuery()->getResult();
    }
}
