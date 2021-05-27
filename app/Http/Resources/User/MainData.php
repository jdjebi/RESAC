<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class MainData extends JsonResource
{ 
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'fullname' => $this->fullname,
            'promo' => $this->promo,
            'universite' => $this->universite,
            'emploi' => $this->emploi,
            'pays' => $this->pays,
            'photo' => photos_cdn_asset($this), 
            'ville' => $this->ville,
            'commune' => $this->commune,
            'numero' => $this->numero,

        ];
    }
}
