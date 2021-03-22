<?php

namespace App\RESAC\Core\Security;

class RolesFactory{
    const ROLES_DATABASE = [
        "admin" => [
            "name" => "admin",
            "label" => "Administrateur",
            "level" => 4,
            "guard"  => 'web',
        ],
        "developer" => [
            "name" => "developer",
            "label" => "Développeur",
            "level" => 3,
            "guard"  => 'web',
        ],
        "moderator" => [
            "name" => "moderator",
            "label" => "Modérateur",
            "level" => 2,
            "guard"  => 'web',
        ],
        "member" => [
            "name" => "member",
            "label" => "Membre",
            "level" => 1,
            "guard"  => '',
        ],
    ];

    static function GetLabel($name){
        if(array_key_exists($name,RolesFactory::ROLES_DATABASE))
            return RolesFactory::ROLES_DATABASE[$name]["label"];
        else
            return "";
    }

    static function GetRole($name){
        return RolesFactory::ROLES_DATABASE[$name];
    }

    static function GetRoles($roles_name){
        $roles_label = [];
        foreach ($roles_name as $role_name) {
            $label = RolesFactory::GetLabel($role_name);
            $roles_label[] = $label;
        }
        return implode(", ",$roles_label);
    }

    static function is_admin_roles_in($roles_name){
        foreach ($roles_name as $role_name) {
            $role = RolesFactory::GetRole($role_name);
        }
    }
}

