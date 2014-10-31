<?php
/**
 * Generic Resource Factory
 *
 * Factory used to create an instance of ZF's generic resource class.
 *
 * @package NinjaAuthorization\Permissions\Acl\Resource
 * @filesource
 */

namespace NinjaAuthorization\Permissions\Acl\Resource;

use InvalidArgumentException;
use Zend\Permissions\Acl\Resource\GenericResource;

/**
 * Generic Resource Factory
 *
 * Factory used to create an instance of ZF's generic resource class.
 *
 * @package NinjaAuthorization\Permissions\Acl\Resource
 */
class GenericResourceFactory
{

  /**
   * Create Service
   *
   * Creates an instance of ZF's generic resource class.
   *
   * @throws InvalidArgumentException If an invalid resource ID is provided.
   * @param string $resourceId The resource ID.
   * @return GenericResource An instance of ZF's generic resource class.
   */
  public function createService($resourceId)
  {

    // Cleanse input.
    $resourceId = trim((string)$resourceId);
    if ("" === $resourceId) {
      throw new InvalidArgumentException("An invalid resource ID was provided.");
    }

    return new GenericResource($resourceId);
  }
}
