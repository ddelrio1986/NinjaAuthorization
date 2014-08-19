<?php
/**
 * Permission
 *
 * This is abstract permission service which should be extended by the real permission service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use Doctrine\Common\Persistence\ObjectManager;
use InvalidArgumentException;
use NinjaAuthorization\EntityRepository\Permission as PermissionEntityRepository;

/**
 * Permission
 *
 * This is abstract permission service which should be extended by the real permission service.
 *
 * @package NinjaAuthorization\Service
 */
class Permission extends AbstractService
{
}
