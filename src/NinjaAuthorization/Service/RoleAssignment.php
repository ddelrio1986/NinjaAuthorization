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
     * Delete By Role ID and User ID
     *
     * Delete the role assignments with the specified role and the specified user.
     *
     * @param int $roleId The role to use.
     * @param int $userId The user to use.
     */
    public function deleteByRoleIdAndUserId($roleId, $userId)
    {

        // Cleanse params.
        $roleId = (int)$roleId;
        if (0 === $roleId) throw new \Exception('Invalid role ID provided.');
        $userId = (int)$userId;
        if (0 === $userId) throw new \Exception('Invalid user ID provided.');

        // Build a query to get the role assignments.
        $qb = $this->_em->createQueryBuilder();
        $qb->select('e')
            ->from($this->entity, 'e')
            ->join('e.role', 'r')
            ->join('e.user', 'u')
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->eq('r.id', ':roleId'),
                    $qb->expr()->eq('u.id', ':userId')
                )
            )
            ->setParameters(array('roleId' => $roleId, 'userId' => $userId));

        // Mark the results as deleted.
        $results = $qb->getQuery()->getResult();
        foreach ($results as $roleAssignment) {
            $this->persist($roleAssignment->setDeleted(true)->setDateModified());
        }
    }

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
