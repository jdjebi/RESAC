<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Comment extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
