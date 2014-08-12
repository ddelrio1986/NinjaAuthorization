<?php
/**
 * Privilege Factory
 *
 * Factory for the privilege entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use NinjaServiceLayer\Entity\FactoryInterface;

/**
 * Privilege Factory
 *
 * Factory for the privilege entity.
 *
 * @package NinjaAuthorization\Entity
 */
class PrivilegeFactory implements FactoryInterface
{

    /**
     * Create Entity
     *
     * Creates the privilege entity
     *
     * @return AbstractPrivilege The privilege entity.
     */
    public function createEntity()
    {
        return new Privilege();
    }
}
