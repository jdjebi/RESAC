<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RoleCollection extends ResourceCollection
{ 
    public function toArray($request)
    {
        $roles_tmp = $this->collection;

        $roles = [];

        foreach ($roles_tmp as $role) {

            $roles[] = [
                "id" => $role->id,
                "name" => $role->name
            ];
        }

        return $roles;

    }
}
