<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\User\MainData as UserMainDataResources;
use App\Http\Resources\User\ManageUserCollection;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CreateRoleController extends Controller
{
 
    public function create(Request $request){
        $data = [];
        $data["error"] = false;
        if($request->filled("role_name")){
            $role = Role::where("name",$request->role_name)->get();
            $data["role"] = $role;
            if(count($role) == 0){
                Role::create(['name' => $request->role_name]);
                $data["message"] = "Le rôle '".$request->role_name."' a été créé";
                \Flash::add("Le rôle '".$request->role_name."' a été créé","success");
            }else{
                $data["error"] = true;
                $data["message"] = "Le rôle '".$request->role_name."' existe déjà";
                \Flash::add("Le rôle '".$request->role_name."' existe déjà","danger");
            }
        }else{
           $data["error"] = true;
           $data["message"] = "Aucun titre renseigné";
           \Flash::add("Aucun titre renseigné","danger");
        }
        return json_encode($data);
    }
}

?>
