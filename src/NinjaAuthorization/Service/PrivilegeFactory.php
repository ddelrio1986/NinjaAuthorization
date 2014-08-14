<?php
/**
 * Privilege Factory
 *
 * A factory for the privilege service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Privilege Factory
 *
 * A factory for the privilege service.
 *
 * @package NinjaAuthorization\Service
 */
class PrivilegeFactory implements FactoryInterface
{

    /**
     * Create Service
     *
     * Creates the privilege service.
     *
     * @param ServiceLocatorInterface $serviceLocator The service locator.
     * @return Privilege The privilege service.
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Privilege();
    }
}
