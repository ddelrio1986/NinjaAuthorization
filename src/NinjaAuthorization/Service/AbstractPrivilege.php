<?php
/**
 * Abstract Privilege
 *
 * This is the abstract privilege service which should be extended by the real privilege service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

/**
 * Abstract Privilege
 *
 * This is the abstract privilege service which should be extended by the real privilege service.
 *
 * @package NinjaAuthorization\Service
 */
class AbstractPrivilege extends AbstractEntityService
{
    protected $entity = 'NinjaAuthorization\Entity\AbstractPrivilege';
}
