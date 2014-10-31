<?php
/**
 * Resource Factory
 *
 * Factory for the resource entity.
 *
 * @package NinjaAuthorization\Entity
 * @filesource
 */

namespace NinjaAuthorization\Entity;

use NinjaServiceLayer\Entity\FactoryInterface;

/**
 * Resource Factory
 *
 * Factory for the resource entity.
 *
 * @package NinjaAuthorization\Entity
 */
class ResourceFactory implements FactoryInterface
{

  /**
   * Create Entity
   *
   * Creates the resource entity
   *
   * @return AbstractResource The resource entity.
   */
  public function createEntity()
  {
    return new Resource;
  }
}
