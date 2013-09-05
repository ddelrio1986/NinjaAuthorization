<?php
/**
 * Module Configuration
 *
 * This is the module configuration for the NinjaAuthorization module.
 *
 * @package NinjaAuthorization;
 * @filesource
 */

namespace NinjaAuthorization;

return array(
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver',
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            __NAMESPACE__ . '\Service\Acl' => __NAMESPACE__ . '\Service\Acl',
            'ZFAcl' => 'Zend\Permissions\Acl\Acl',
        ),
    ),
);
