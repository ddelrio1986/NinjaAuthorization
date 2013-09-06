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
    'ninja_authorization' => array(
        'admin_role_name' => 'admin',
        'guest_role_name' => 'guest',
    ),
    'service_manager' => array(
        'factories' => array(
            'PermissionService' => function ($serviceLocator) {
                return $serviceLocator->get(__NAMESPACE__ . '\Service\PermissionEntityService');
            },
            'PrivilegeService' => function ($serviceLocator) {
                return $serviceLocator->get(__NAEMSPACE__ . '\Service\PrivilegeEntityService');
            },
            'ResourceService' => function ($serviceLocator) {
                return $serviceLocator->get(__NAMESPACE__ . '\Service\ResourceEntityService');
            },
            'RoleService' => function ($serviceLocator) {
                return $serviceLocator->get(__NAMESPACE__ . '\Service\RoleEntityService');
            },
            'RoleAssignmentService' => function ($serviceLocator) {
                return $serviceLocator->get(__NAMESPACE__ . '\Service\RoleAssignmentEntityService');
            },
        ),
        'invokables' => array(
            __NAMESPACE__ . '\Entity\Permission' => __NAMESPACE__ . '\Entity\Permission',
            __NAMESPACE__ . '\Entity\Privilege' => __NAMESPACE__ . '\Entity\Privilege',
            __NAMESPACE__ . '\Entity\Resource' => __NAMESPACE__ . '\Entity\Resource',
            __NAMESPACE__ . '\Entity\Role' => __NAMESPACE__ . '\Entity\Role',
            __NAMESPACE__ . '\Entity\RoleAssignment' => __NAMESPACE__ . '\Entity\RoleAssignment',
            __NAMESPACE__ . '\Service\Acl' => __NAMESPACE__ . '\Service\Acl',
            'ZFAcl' => 'Zend\Permissions\Acl\Acl',
        ),
    ),
);
