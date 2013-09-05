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

use NinjaAuthorization\Entity\AbstractEntity;
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
     * Delete By ID
     *
     * This will delete an entity by ID provided.
     *
     * @param int $id The ID of the entity to delete.
     * @return AbstractEntity The entity that was deleted.
     */
    public function deleteById($id)
    {
        $entity = $this->getById($id);
        $entity->setDeleted(1);
        $this->persist($entity);
        return $entity;
    }

    /**
     * Get New Entity
     *
     * This method will return a brand new instance of the entity that this service is meant to work with.
     *
     * @return AbstractEntity
     */
    public function getNewEntity()
    {
        $entity = parent::getNewEntity();
        return $entity->setDateAdded()->setDateModified();
    }

    /**
     * Get Not Deleted
     *
     * Gets all not deleted entities, ordered by id if not specified.
     *
     * @param string $sort The ordering expression.
     * @param string $order The ordering direction.
     * @return AbstractEntity[] An array of all not deleted entities.
     */
    public function getNotDeleted($sort = 'id', $order = 'ASC')
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->select('e')
            ->from($this->entity, 'e')
            ->where($qb->expr()->neq('e.deleted', true))
            ->orderBy('e.'.$sort, $order);
        return $qb->getQuery()->getResult();
    }
}
