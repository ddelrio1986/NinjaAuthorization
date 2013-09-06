<?php
/**
 * Permission
 *
 * This is abstract permission service which should be extended by the real permission service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

/**
 * Permission
 *
 * This is abstract permission service which should be extended by the real permission service.
 *
 * @package NinjaAuthorization\Service
 */
class Permission extends AbstractEntityService
{
    protected $entity = 'NinjaAuthorization\Entity\Permission';

    /**
     * Get Not Deleted By User ID
     *
     * Get the not deleted permissions tied to the specified user ID.
     *
     * @param int $userId The user ID to get permissions for.
     * @return AbstractPermission[] The permissions for the specified user.
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
            ->setParameters(array('deleted' => 0, 'userId' => $userId));

        // Return results.
        return $qb->getQuery()->getResult();
    }

    /**
     * Get Not Deleted Role Permissions
     *
     * Get all of the permissions that are for a role and not for a user.
     *
     * @return AbstractPermission[] The permissions.
     */
    public function getNotDeletedRolePermissions()
    {

        // Build the query.
        $qb = $this->_em->createQueryBuilder();
        $qb->select('e')
            ->from($this->entity, 'e')
            ->leftJoin('e.user', 'u')
            ->where(
                $qb->expr()->andX(
                    $qb->expr()->eq('e.deleted', ':deleted'),
                    $qb->expr()->isNull('u.id')
                )
            )
            ->setParameters(array('deleted' => 0));

        // Return results.
        return $qb->getQuery()->getResult();
    }
}
