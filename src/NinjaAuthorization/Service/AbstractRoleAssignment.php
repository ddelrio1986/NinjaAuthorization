<?php
/**
 * Abstract Role Assignment
 *
 * This is the abstract role assignment service which should be extended by the actual role assignment service.
 *
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

/**
 * Abstract Role Assignment
 *
 * This is the abstract role assignment service which should be extended by the actual role assignment service.
 *
 * @package NinjaAuthorization\Service
 */
class AbstractRoleAssignment extends AbstractEntityService
{
    protected $entity = 'NinjaAuthorization\Entity\AbstractRoleAssignment';
}
