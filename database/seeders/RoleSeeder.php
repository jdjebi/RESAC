<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\RESAC\Core\Security\RolesFactory;

class RoleSeeder extends Seeder
{
    /**
     * Gère la création des rôles
     *
     * @return void
     */
    public function run()
    {
        $roles = RolesFactory::ROLES_DATABASE;

        foreach ($roles as $role) {

            $roleModel = Role::where('name',$role['name'])->where('guard_name',$role['guard'])->first();

            // On teste si le rôle n'existe pas déjà
            if($roleModel == null){
                Role::create([
                    'name' => $role['name'],
                    'guard_name' => $role['guard']
                ]);
            }
        
        }
    }
}
