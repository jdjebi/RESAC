<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\RESAC\Defines;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Permet de creer le super administrateur, c'est a dire le premier utilisateur.
     * Le super utilisateur est unique
     * Cet utilisateur n'est ni modifiable, ni supprimable
     *
     * @return void
     */
    public function run()
    {
        // Creer le superadmin et lui assigner un rôle

        $user = User::where("email","supermointi@resac.com")->first();

        dump($user);

        if($user == null){
            $user = User::create([
                "nom" => "supermointi",
                "prenom" => "supermointi",
                "email" => "supermointi@resac.com",
                "password" => Hash::make("admin"),
                "is_superadmin" => true,
                "is_staff" => true,
                "staff_role" => "superadmin",
                "version" => Defines::CURRENT_UPDATE_VERSION, // version actuelle des comptes
            ]);
            $user->assignRole("superadmin");
            $user->save();
        }

    }
}
