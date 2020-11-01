<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Resac\Core\Security\RolesFactory;


class RoleCollection extends ResourceCollection
{ 
    public function toArray($request)
    {
        $roles_tmp = $this->collection;

        $roles = [];

        foreach ($roles_tmp as $role) {

            $label = RolesFactory::GetLabel($role->name);

            $permissions = $role->getAllPermissions();

            $roles[] = [
                "id" => $role->id,
                "name" => $role->name,
                "label" => ($label == "" ? $role->name : $label),
                "permissions" => $permissions,
                "url" => route('admin.roles.show',$role->id),
            ];
        }

        return $roles;

    }
}
