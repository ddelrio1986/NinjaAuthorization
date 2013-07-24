<?php

namespace NinjaAuthorization\Entity;

interface UserInterface
{
    public function addRoleAssignment(RoleAssignment $roleAssignment);

    public function addPermission(Permission $permission);
}