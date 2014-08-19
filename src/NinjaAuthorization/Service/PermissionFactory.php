<?php
/**
 * Permission Factory
 *
 * A factory for the permission service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Permission Factory
 *
 * A factory for the permission service.
 *
 * @package NinjaAuthorization\Service
 */
class PermissionFactory implements FactoryInterface
{

    /**
     * Create Service
     *
     * Creates the permission service.
     *
     * @param ServiceLocatorInterface $serviceLocator The service locator.
     * @return Permission The permission service.
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $objectManager = $serviceLocator->get('doctrine.entitymanager.orm_default');
        return new Permission($objectManager);
    }
}
