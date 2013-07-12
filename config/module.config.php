<?php

namespace NinjaAuthorization;

return array(
    'service_manager' => array(
        'invokables' => array(
            __NAMESPACE__ . '\Entity\Permission' => __NAMESPACE__ . '\Entity\Permission',
            __NAMESPACE__ . '\Entity\Privilege' => __NAMESPACE__ . '\Entity\Privilege',
            __NAMESPACE__ . '\Entity\Resource' => __NAMESPACE__ . '\Entity\Resource',
            __NAMESPACE__ . '\Entity\Role' => __NAMESPACE__ . '\Entity\Role',
            __NAMESPACE__ . '\Entity\RoleAssignment' => __NAMESPACE__ . '\Entity\RoleAssignment',
        ),
    ),
);