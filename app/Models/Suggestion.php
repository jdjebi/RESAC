<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model 
{
    protected $table = "suggestions";

    protected $fillable = ['content', 'note', 'etat', 'date', 'noteurs', 'user_author_id'];

    public function user(){
        return $this->belongsTo("App\Models\User","user_author_id");
    }
  
    public function user_object(){
        return $this->belongsTo("App\Models\User","user_author_id");
    }

    public function noteurs(){
        return $this->belongsToMany(User::class);
    }

    public function getNoteAttribute(){

        $noteurs = $this->noteurs()->withPivot('note')->get();

        $note = 0;

        $nbr_noteurs = count($noteurs);

        if($nbr_noteurs>0){
            
            $s_note = 0;

            foreach($noteurs as $noteur){
                $s_note += $noteur->pivot->note;
            }

            $note = intdiv($s_note,$nbr_noteurs);
        }

        return $note;
    }
}