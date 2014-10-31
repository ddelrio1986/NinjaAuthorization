<?php
/**
 * ACL Factory
 *
 * Factory for the ACL service.
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
 * Factory for the ACL service.
 *
 * @package NinjaAuthorization\Service
 */
class AclFactory implements FactoryInterface
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
    $aclFactory = $serviceLocator->get("NinjaAuthorization\Permissions\Acl\AclFactory");
    $applicationConfig = $serviceLocator->get("Config");
    $genericResourceFactory = $serviceLocator->get("NinjaAuthorization\Permissions\Acl\Resource\GenericResourceFactory");
    $genericRoleFactory = $serviceLocator->get("NinjaAuthorization\Permissions\Acl\Role\GenericRoleFactory");
    $objectManager = $serviceLocator->get("doctrine.entitymanager.orm_default");
    $permissionEntityRepository = $objectManager->getRepository("NinjaAuthorization\Entity\Permission");
    $resourceEntityRepository = $objectManager->getRepository("NinjaAuthorization\Entity\Resource");
    $roleAssignmentEntityRepository = $objectManager->getRepository("NinjaAuthorization\Entity\RoleAssignment");
    $roleEntityRepository = $objectManager->getRepository("NinjaAuthorization\Entity\Role");

    return new Acl(
      $aclFactory,
      $applicationConfig,
      $genericResourceFactory,
      $genericRoleFactory,
      $objectManager,
      $permissionEntityRepository,
      $resourceEntityRepository,
      $roleAssignmentEntityRepository,
      $roleEntityRepository
    );
  }
}
