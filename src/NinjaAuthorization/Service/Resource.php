<?php
/**
 * Resource
 *
 * This is the abstract resource service which should be extended by the actual resource service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

/**
 * Resource
 *
 * This is the abstract resource service which should be extended by the actual resource service.
 *
 * @package NinjaAuthorization\Service
 */
class Resource extends AbstractEntityService
{
    protected $entity = 'NinjaAuthorization\Entity\Resource';
}
