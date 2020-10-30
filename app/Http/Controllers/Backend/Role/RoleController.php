<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Http\Resources\Role\RoleCollection;



class RoleController extends Controller
{
    public function index(Request $request){
        return new RoleCollection(Role::orderBy('name')->get());
    }

    public function create(Request $request){
        $data = [];
        $data["error"] = false;
        $is_error = false;
        if($request->filled("role_name")){
            $role = Role::where("name",$request->role_name)->get();
            if(count($role) == 0){
                $role = Role::create(['name' => $request->role_name]);
                $data["role"] = [
                    "id" => $role->id,
                    "name" => $role->name
                ];
                $data["message"] = "Le rôle '".$request->role_name."' a été créé";
            }else{
                $is_error = true;
                $data["message"] = "Le rôle '".$request->role_name."' existe déjà";
            }
        }else{
            $is_error = true;
            $data["message"] = "Aucun titre renseigné";
        }

        if($is_error)
            $is_error = true;

        return json_encode($data);
    }

}

?>
