<?php

namespace App\Http\Controllers\Backend\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;

use App\Http\Resources\Permission\PermissionCollection;


class PermissionController extends Controller
{
    public function index(Request $request){
        return new PermissionCollection(Permission::orderBy('name')->get());
    }

    public function create(Request $request){
        $data = [];
        $data["error"] = false;
        $is_error = false;
        if($request->filled("permission_name")){
            $permission = Permission::where("name",$request->permission_name)->get();
            if(count($permission) == 0){
                $permission = Permission::create(['name' => $request->permission_name]);
                $data["permission"] = [
                    "id" => $permission->id,
                    "name" => $permission->name
                ];
                $data["message"] = "La permission '".$request->permission_name."' a été créé";
            }else{
                $is_error = true;
                $data["message"] = "La permission '".$request->permission_name."' existe déjà";
            }
        }else{
            $is_error = true;
            $data["message"] = "Aucun titre renseigné";
        }
        if($is_error)
            $is_error = true;
        return json_encode($data);
    }

    public function update(Request $request){
       
    }

    public function delete(Request $request, $id){
        $role = Permission::find($id);
        $data = [];
        if($role){
            $data["permission"] = $role;
            $role->delete();
            $data["error"] = false;
            $data["message"] = "La permission '".$role->name."' a bien été supprimé.";
        }else{
            $data["error"] = true;
            $data["message"] = "La permission n'existe pas.";
        }
        return json_encode($data);
    }

}

?>
