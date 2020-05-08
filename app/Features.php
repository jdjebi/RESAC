<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Features extends Model
{
    protected $table = 'new_features';

    public $timestamps = false;

    protected $fillable = ['title','content','user_author_id'];

    public function author(){
      return $this->belongsTo("App\User","user_author_id");
    }

    public function get_sm_created_at(){
      setlocale(LC_TIME, "fr_FR");
      return strftime("%d %B %G", strtotime($this->attributes["created_at"]));
    }
}
