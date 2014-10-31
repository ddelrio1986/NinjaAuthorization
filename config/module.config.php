<?php

namespace NinjaAuthorization;

return array(
  "doctrine" => array(
    "driver" => array(
      __NAMESPACE__ . "_driver" => array(
        "class" => "Doctrine\ORM\Mapping\Driver\AnnotationDriver",
        "cache" => "array",
        "paths" => array(__DIR__ . "/../src/" . __NAMESPACE__ . "/Entity"),
      ),
      "orm_default" => array(
        "drivers" => array(
          __NAMESPACE__ . "\Entity" => __NAMESPACE__ . "_driver",
        ),
      ),
    ),
  ),
  "ninja_authorization" => array(
    "admin_role_name" => "admin",
    "current_user_role_name" => "current-user",
    "guest_role_name" => "guest",
  ),
  "service_manager" => array(
    "factories" => array(

      // Entity services.
      __NAMESPACE__ . "\Service\Acl" => __NAMESPACE__ . "\Service\AclFactory",
      __NAMESPACE__ . "\Service\Permission" => __NAMESPACE__ . "\Service\PermissionFactory",
      __NAMESPACE__ . "\Service\Privilege" => __NAMESPACE__ . "\Service\PrivilegeFactory",
      __NAMESPACE__ . "\Service\Resource" => __NAMESPACE__ . "\Service\ResourceFactory",
      __NAMESPACE__ . "\Service\Role" => __NAMESPACE__ . "\Service\RoleFactory",
      __NAMESPACE__ . "\Service\RoleAssignment" => __NAMESPACE__ . "\Service\RoleAssignmentFactory",
    ),
    "invokables" => array(

      // Entity factories.
      __NAMESPACE__ . "\Entity\PermissionFactory" => __NAMESPACE__ . "\Entity\PermissionFactory",
      __NAMESPACE__ . "\Entity\PrivilegeFactory" => __NAMESPACE__ . "\Entity\PrivilegeFactory",
      __NAMESPACE__ . "\Entity\ResourceFactory" => __NAMESPACE__ . "\Entity\ResourceFactory",
      __NAMESPACE__ . "\Entity\RoleFactory" => __NAMESPACE__ . "\Entity\RoleFactory",
      __NAMESPACE__ . "\Entity\RoleAssignmentFactory" => __NAMESPACE__ . "\Entity\RoleAssignmentFactory",

      // Miscellaneous factories.
      __NAMESPACE__ . "\Permissions\Acl\AclFactory" => __NAMESPACE__ . "\Permissions\Acl\AclFactory",
      __NAMESPACE__ . "\Permissions\Acl\Resource\GenericResourceFactory" => __NAMESPACE__ . "\Permissions\Acl\Resource\GenericResourceFactory",
      __NAMESPACE__ . "\Permissions\Acl\Role\GenericRoleFactory" => __NAMESPACE__ . "\Permissions\Acl\Role\GenericRoleFactory",
    ),
  ),
);
