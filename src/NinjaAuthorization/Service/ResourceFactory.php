<?php
/**
 * Resource Factory
 *
 * Factory for the resource service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Resource Factory
 *
 * Factory for the resource service.
 *
 * @package NinjaAuthorization\Service
 */
class ResourceFactory implements FactoryInterface
{

  /**
   * Create Service
   *
   * Creates the resource service.
   *
   * @param ServiceLocatorInterface $serviceLocator The service locator.
   * @return Resource The resource service.
   */
  public function createService(ServiceLocatorInterface $serviceLocator)
  {
    $objectManager = $serviceLocator->get("doctrine.entitymanager.orm_default");
    return new Resource($objectManager);
  }
}
