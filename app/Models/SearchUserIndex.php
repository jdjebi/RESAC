<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchUserIndex extends Model
{
    protected $table = "searchuserindex";

    protected $dates = [
        'updated_at',
    ];

    public function user(){
      return $this->belongsTo("App\User","users_id");
    }
}
