<?php
/**
 * Role Factory
 *
 * A factory for the role service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Role Factory
 *
 * A factory for the role service.
 *
 * @package NinjaAuthorization\Service
 */
class RoleFactory implements FactoryInterface
{

    /**
     * Create Service
     *
     * Creates the role service.
     *
     * @param ServiceLocatorInterface $serviceLocator The service locator.
     * @return Role The role service.
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Role();
    }
}
