<?php
/**
 * Role Assignment Factory
 *
 * A factory for the role assignment service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Role Assignment Factory
 *
 * A factory for the role assignment service.
 *
 * @package NinjaAuthorization\Service
 */
class RoleAssignmentFactory implements FactoryInterface
{

    /**
     * Create Service
     *
     * Creates the role assignment service.
     *
     * @param ServiceLocatorInterface $serviceLocator The service locator.
     * @return RoleAssignment The role assignment service.
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $objectManager = $serviceLocator->get('doctrine.entitymanager.orm_default');
        return new RoleAssignment($objectManager);
    }
}
