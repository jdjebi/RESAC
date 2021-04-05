<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\RESAC\Core\Security\RolesFactory;

class PermissionSeeder extends Seeder
{
    /**
     * Gère la création des permissions
     *
     * @return void
     */
    public function run()
    {
        $permissions = RolesFactory::PERMISSIONS_DATABASE;

        foreach($permissions as $permission){

            $permissionModel = Permission::where('name',$permission['name'])->first();

            // Test l'inexistante de la permission
            if($permissionModel == null){
                Permission::create(['name' => $permission['name']]);
            }
        }

    }
}
