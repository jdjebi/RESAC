<?php

namespace App\Http\Controllers\UI\admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsController extends Controller
{

    public function roles(){
        $user = UserAuth();

        $roles = Role::orderBy('name')->get();

        $title = "Rôles";

        return view("admin.roles_permissions.roles",[
            "title" => $title,
            "roles" => $roles,
        ]);
    }

    public function permissons(){
        return "";
    }

}

?>
