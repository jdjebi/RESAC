<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\RESAC\Core\Security\RolesFactory;

class RolePermissionSeeder extends Seeder
{
    /**
     * Association des roles et permissions
     *
     * @return void
     */
    public function run()
    {
        $roles = RolesFactory::ROLES_DATABASE;

        foreach ($roles as $role) {

            $roleModel = Role::where('name',$role['name'])->where('guard_name',$role['guard'])->first();

            $roleModel->syncPermissions($role["permissions"]);
        
        }
    }
}
