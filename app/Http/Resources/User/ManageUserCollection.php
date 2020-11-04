<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ManageUserCollection extends ResourceCollection
{ 
    public function toArray($request)
    {
        $users_tmp = $this->collection;

        $users = [];

        foreach ($users_tmp as $user) {
            $users[] = [
                'id' => $user->id,
                'nom' => $user->nom,
                'prenom' => $user->prenom,
                'promo' => $user->promo,
                'universite' => $user->universite,
                'emploi' => $user->emploi,
                'pays' => $user->pays,
                'role' => $user->staff_role,
                'photo' => asset(photos_cdn_asset($user)),
                'version' => $user->version, 
                'profil_url' => route('profil')."?id=".$user->id,
                'admin_profil_url' => route('admin_user_profil',['id' => $user->id])
            ];
        }

        return $users;
    }
}
