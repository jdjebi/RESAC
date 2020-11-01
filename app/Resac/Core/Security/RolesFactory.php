<?php

namespace App\RESAC\Core\Security;

class RolesFactory{
    const ROLES_DATABASE = [
        "superadmin" => [
            "name" => "superadmin",
            "label" => "Super Administrateur"
        ],
        "admin" => [
            "name" => "admin",
            "label" => "Administrateur"
        ],
        "developer" => [
            "name" => "developer",
            "label" => "Développeur"
        ],
        "moderator" => [
            "name" => "moderator",
            "label" => "Modérateur"
        ],
        "member" => [
            "name" => "member",
            "label" => "Membre"
        ],
    ];

    static function GetLabel($name){
        if(array_key_exists($name,RolesFactory::ROLES_DATABASE))
            return RolesFactory::ROLES_DATABASE[$name]["label"];
        else
            return "";
    }
}

