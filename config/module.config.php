<?php

return array(
    'doctrine' => array(
        'driver' => array(
            'NinjaAuthorization_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . 'NinjaAuthorization/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'NinjaAuthorization\Entity' => 'NinjaAuthorization_driver',
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

            // Entity services.
            'NinjaAuthorization\Service\Permission' => 'NinjaAuthorization\Service\PermissionFactory',
            'NinjaAuthorization\Service\Privilege' => 'NinjaAuthorization\Service\PrivilegeFactory',
            'NinjaAuthorization\Service\Resource' => 'NinjaAuthorization\Service\ResourceFactory',
            'NinjaAuthorization\Service\Role' => 'NinjaAuthorization\Service\RoleFactory',
            'NinjaAuthorization\Service\RoleAssignment' => 'NinjaAuthorization\Service\RoleAssignmentFactory',
        ),
        'invokables' => array(

            // Entity factories.
            'NinjaAuthorization\Entity\PermissionFactory' => 'NinjaAuthorization\Entity\PermissionFactory',
            'NinjaAuthorization\Entity\PrivilegeFactory' => 'NinjaAuthorization\Entity\PrivilegeFactory',
            'NinjaAuthorization\Entity\ResourceFactory' => 'NinjaAuthorization\Entity\ResourceFactory',
            'NinjaAuthorization\Entity\RoleFactory' => 'NinjaAuthorization\Entity\RoleFactory',
            'NinjaAuthorization\Entity\RoleAssignmentFactory' => 'NinjaAuthorization\Entity\RoleAssignmentFactory',

            'NinjaAuthorization\Service\Acl' => 'NinjaAuthorization\Service\Acl',
            'Zend\Permissions\Acl\Acl' => 'Zend\Permissions\Acl\Acl',
        ),
    ),
);
