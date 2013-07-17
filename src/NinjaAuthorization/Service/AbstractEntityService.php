<?php
/**
 * Abstract Entity Service
 * 
 * This is the file for an abstract class that all services designed to work with an entity should extend.
 * 
 * @package NinjaAuthorization\Service
 * @filesource
 */

namespace NinjaAuthorization\Service;

use NinjaServiceLayer\Service\AbstractEntityService AS NinjaAbstractEntityService;

/**
 * Abstract Entity Service
 *
 * This is an abstract class that all services designed to work with an entity should extend.
 *
 * @package NinjaAuthorization\Service
 */
abstract class AbstractEntityService extends NinjaAbstractEntityService
{

    /**
     * Get New Entity
     * 
     * Gets a new instance of the entity that this entity service is designed to work with.
     * 
     * @return \NinjaAuthorization\Entity\AbstractEntity
     */
    public function getNewEntity()
    {
        $entity = parent::getNewEntity(); /* @var $entity \NinjaAuthorization\Entity\AbstractEntity */
        return $entity->setDateAdded()
                ->setDateModified();
    }
}