<?php
/**
 * ACL Factory
 *
 * A factory for the ACL service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * ACL Factory
 *
 * A factory for the ACL service.
 *
 * @package NinjaAuthorization\Service
 */
class AclFactory implements ServiceLocatorInterface
{

    /**
     * Create Service
     *
     * Creates the ACL service.
     *
     * @param ServiceLocatorInterface $serviceLocator The service locator.
     * @return Acl The ACL service.
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Acl();
    }
}
