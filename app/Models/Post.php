<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ["user","content","validate","user_id","status","validate_status"];

    // Constantes d'état d'une publication
    const BROUILLON = 0;
    const PUBLIE = 1;
    const TERMINE = 2;

    // Constantes d'état de validation
    const NEUTRE = 3;
    const EN_ATTENTE = 2;
    const ACCEPTE = 1;
    const CERTIFIE = 1;
    const REFUSE = 0;

    public function user(){
      return $this->belongsTo("App\User","user");
    }

    public function certificate_author(){
      return $this->belongsTo("App\User","validate_by");
    }

    public function user_object(){
      return $this->belongsTo("App\User","user");
    }

    public function getValidateStatusTagAttribute(){
      $validate_status = $this->attributes['validate_status'];
      if($validate_status == 0)
        return 'danger'; 
      elseif($validate_status == 1)
        return 'success';
      elseif($validate_status == 2)
        return 'warning'; 
      else 
        return 'muted';
    }

}
