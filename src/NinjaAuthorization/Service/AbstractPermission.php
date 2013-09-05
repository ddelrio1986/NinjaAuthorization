<?php
/**
 * Abstract Permission
 *
 * This is abstract permission service which should be extended by the real permission service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

/**
 * Abstract Permission
 *
 * This is abstract permission service which should be extended by the real permission service.
 *
 * @package NinjaAuthorization\Service
 */
class AbstractPermission extends AbstractEntityService
{
    protected $entity = 'NinjaAuthorization\Entity\AbstractPermission';
}
