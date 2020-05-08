<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $table = 'new_features';
    public $timestamps = false;
    protected $fillable = ['title','content','user_author_id'];
}
