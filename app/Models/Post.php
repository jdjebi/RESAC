<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected $fillable = ["user","content","validate"];
    public $timestamps = false;


    public function user(){
      return $this->belongsTo("App\User","user");
    }

    public function certificate_author(){
      return $this->belongsTo("App\User","validate_by");
    }

    public function user_object(){
      return $this->belongsTo("App\User","user");
    }

}
