<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserSuggestionResource extends JsonResource
{ 
    public function toArray($request)
    {
        return [
                'id' => $this->id,
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'fullname' => $this->fullname,
                'universite' => $this->universite,
                'emploi' => $this->emploi,
                'pays' => $this->pays,
                'photo' => asset(photos_cdn_asset($this)),
                'profil' =>  route('profil.visitor',$this->id),
                'note' => $this->pivot->note
        ];
    }
}
