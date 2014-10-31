<?php
/**
 * ACL Factory
 *
 * Factory used to create an instance of ZF's ACL class.
 *
 * @package NinjaAuthorization\Permissions\Acl
 * @filesource
 */

namespace NinjaAuthorization\Permissions\Acl;

use Zend\Permissions\Acl\Acl;

/**
 * ACL Factory
 *
 * Factory used to create an instance of ZF's ACL class.
 *
 * @package NinjaAuthorization\Permissions\Acl
 */
class AclFactory
{

  /**
   * Create Service
   *
   * Creates an instance of ZF's ACL class.
   *
   * @return Acl An instance of ZF's ACL class.
   */
  public function createService()
  {
    return new Acl;
  }
}
