<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model 
{
    protected $table = "suggestions";

    protected $fillable = ['content', 'note', 'etat', 'date', 'noteurs', 'user_author_id'];

    public function user(){
        return $this->belongsTo("App\User","user_author_id");
    }
  
    public function user_object(){
        return $this->belongsTo("App\User","user_author_id");
    }
}