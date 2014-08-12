<?php
/**
 * Role Factory
 *
 * Factory for the role entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use NinjaServiceLayer\Entity\FactoryInterface;

/**
 * Role Factory
 *
 * Factory for the role entity.
 *
 * @package NinjaAuthorization\Entity
 */
class RoleFactory implements FactoryInterface
{

    /**
     * Create Entity
     *
     * Creates the role entity
     *
     * @return AbstractRole The role entity.
     */
    public function createEntity()
    {
        return new Role();
    }
}
