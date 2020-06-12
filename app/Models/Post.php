<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "pub_v1";

    public function user(){
      return $this->belongsTo("App\User","users_id");
    }

}
