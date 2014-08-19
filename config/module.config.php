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
        'current_user_role_name' => 'current-user',
        'guest_role_name' => 'guest',
    ),
    'service_manager' => array(
        'factories' => array(

            // Entity services.
            'NinjaAuthorization\Service\Acl' => 'NinjaAuthorization\Service\AclFactory',
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

            // Miscellaneous factories.
            'NinjaAuthorization\Permissions\Acl\AclFactory' => 'NinjaAuthorization\Permissions\Acl\AclFactory',
            'NinjaAuthorization\Permissions\Acl\Resource\GenericResourceFactory' => 'NinjaAuthorization\Permissions\Acl\Resource\GenericResourceFactory',
            'NinjaAuthorization\Permissions\Acl\Role\GenericRoleFactory' => 'NinjaAuthorization\Permissions\Acl\Role\GenericRoleFactory',
        ),
    ),
);
