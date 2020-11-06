<?php

namespace App\Http\Controllers\Backend\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;

use App\Http\Resources\Role\RoleCollection;
use App\Http\Resources\Role\Role as RoleJson;


class RoleController extends Controller
{
    public function index(Request $request){
        return new RoleCollection(Role::orderBy('name')->get());
    }

    public function show(Request $request, $id){
        return new RoleJson(Role::find($id));
    }

    public function update(Request $request, $id){
        $data = [];
        $data["error"] = false;
        $is_error = false;

        // Validation des données

        $data["e"] = $request->all();

        if(true){
            $role = Role::find($id);
            if($role){
                $permissions = $request->permissions;
                $permissions_array = [];
                foreach ($permissions as $permission) {
                    $permissions_array[] = strtolower($permission['name']);
                }
                $role->syncPermissions($permissions_array );
                $data["message"] = "Mise à jour éffectuée.";
            }else{
                $is_error = true;
                $data["message"] = "Rôle introuvable.";
            }
        }

        if($is_error)
            $data["error"] = true;

        return json_encode($data);
    }

    public function create(Request $request){
        $data = [];
        $data["error"] = false;
        $is_error = false;
        if($request->filled("role_name")){
            $role = Role::where("name",$request->role_name)->get();
            if(count($role) == 0){
                $role = Role::create(['name' => strtolower($request->role_name)]);
                $data["role"] = new RoleJson($role);
                $data["message"] = "Le rôle '".$request->role_name."' a été créé.";
            }else{
                $is_error = true;
                $data["message"] = "Le rôle '".$request->role_name."' existe déjà.";
            }
        }else{
            $is_error = true;
            $data["message"] = "Aucun titre renseigné.";
        }
        if($is_error)
            $data["error"] = true;
        return json_encode($data);
    }

    public function delete(Request $request, $id){
        $role = Role::find($id);
        $data = [];
        if($role){
            $data["role"] = $role;
            $role->delete();
            $data["error"] = false;
            $data["message"] = "Le rôle '".$role->name."' a bien été supprimé.";
        }else{
            $data["error"] = true;
            $data["message"] = "Le rôle n'existe pas.";
        }
        return json_encode($data);
    }

}

?>
