<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\RESAC\Core\Security\RolesFactory;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = RolesFactory::ROLES_DATABASE;

        foreach ($roles as $key => $role) {
            Role::create([
                'name' => $role['name'],
                'guard_name' => $role['guard']
            ]);
        }
    }
}
