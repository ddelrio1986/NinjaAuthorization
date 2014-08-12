<?php
/**
 * Permission Factory
 *
 * Factory for the permission entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use NinjaServiceLayer\Entity\FactoryInterface;

/**
 * Permission Factory
 *
 * Factory for the permission entity.
 *
 * @package NinjaAuthorization\Entity
 */
class PermissionFactory implements FactoryInterface
{

    /**
     * Create Entity
     *
     * Creates the permission entity
     *
     * @return AbstractPermission The permission entity.
     */
    public function createEntity()
    {
        return new Permission();
    }
}
