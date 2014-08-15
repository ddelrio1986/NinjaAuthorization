<?php
/**
 * Role
 *
 * Entity repository for the role entity.
 *
 * @package NinjaAuthorization\EntityRepository
 * @filesource
 */

namespace NinjaAuthorization\EntityRepository;

use NinjaAuthorization\Entity\Role as RoleEntity;
use NinjaServiceLayer\EntityRepository\AbstractNeverDeletedEntityRepository;

/**
 * Role
 *
 * Entity repository for the role entity.
 *
 * @package NinjaAuthorization\EntityRepository
 */
class Role extends AbstractNeverDeletedEntityRepository
{

    /**
     * Get Not Deleted
     *
     * Gets the roles which have not been deleted.
     *
     * @return RoleEntity[] The roles which have not been deleted.
     */
    public function getNotDeleted()
    {
        return $this->findBy(array('deleted' => 0));
    }
}
