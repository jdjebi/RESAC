<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Resac\Core\Security\RolesFactory;

class Role extends JsonResource
{ 
    public function toArray($request)
    {
        $label = RolesFactory::GetLabel($this->name);

        return  [
            "id" => $this->id,
            "name" => $this->name,
            "label"=> $label,
            "permissions" => $this->getAllPermissions()
        ];
    }
}
