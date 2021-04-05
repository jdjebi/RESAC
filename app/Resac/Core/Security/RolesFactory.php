<?php

namespace App\RESAC\Core\Security;

class RolesFactory{

    // Permissions
    const PERMISSIONS_DATABASE = [
        "dev-tools-access" => [
            "name" => "dev-tools-access",
            "label" => "Accès outils développeur",
            "description" => "Création de notifications; Manipulation de l'index de recherche; Manipulation des mlessages flash"
        ],
        "news-manage" => [
            "name" => "news-manage",
            "label" => "Gestion des nouveautés",
            "description" => "Créer, modifier, affichage, suppression des nouveautés"
        ],
        "post-manage" => [
            "name" => "post-manage",
            "label" => "Gestion des publications",
            "description" => "Autorise la gestion des publications et l'interaction avec le système de publicaton"
        ],
        "user-manage" => [
            "name" => "user-manage",
            "label" => "Gestion des utilisateurs",
            "description" => "Autorise la suppression des membres et modérateurs et la manipulation des rôles (Attribution du rôle administrateur est réservé au super admin)"
        ]
    ];

    // Rôles
    const ROLES_DATABASE = [
        "superadmin" => [
            "name" => "superadmin",
            "label" => "Super Administrateur",
            "level" => 5,
            "guard"  => 'web',
            "permissions" => []
        ],
        "admin" => [
            "name" => "admin",
            "label" => "Administrateur",
            "level" => 4,
            "guard"  => 'web',
            "permissions" => ["post-manage","user-manage","news-manage"]

        ],
        "developer" => [
            "name" => "developer",
            "label" => "Développeur",
            "level" => 3,
            "guard" => 'web',
            "permissions" => ["dev-tools-access", "news-manage"]
        ],
        "moderator" => [
            "name" => "moderator",
            "label" => "Modérateur",
            "level" => 2,
            "guard"  => 'web',
            "permissions" => ["dev-tools-access", "post-manage"]
        ],
        "member" => [
            "name" => "member",
            "label" => "Membre",
            "level" => 1,
            "guard"  => 'web',
            "permissions" => []
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

