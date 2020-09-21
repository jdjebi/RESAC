<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = ['nom','prenom','email','password','version'];

    public function getFullNameAttribute()
    {
        return "{$this->attributes['nom']} {$this->attributes['prenom']}";
    }

    public function getPhotoAttribute(){

      if($this->attributes['photo'] != ""){
        if(env('APP_ENV') == "web"){
          $url = \Storage::disk('dropbox')->url($this->attributes['photo']);
        }
        else{
          $url = asset("storage/{$this->attributes['photo']}",true);
        }
      }
      else{
        $url = asset("asset/imgs/user_default_pic.png",true); 
      }   
      return $url;
    }

    public function getHavePhotoAttribute(){

      if($this->attributes['photo'] != ""){
        return true;
      }
      else{
        return false; 
      }   
      
    }

    public function get_photo2(){

      if($this->attributes['photo'] != ""){
        if(env('APP_ENV') == "web"){
          $url = \Storage::disk('dropbox')->url($this->attributes['photo']);
        }
        else{
          $url = "storage/{$this->attributes['photo']}";
        }
      }
      else{
        $url = "asset/imgs/user_default_pic.png"; 
      }   
      return $url;
    }

    public function getPromoAttribute(){
      return empty($this->attributes['promo1']) || empty($this->attributes['promo2']) ? "xxxx-xxxx" : $this->attributes['promo1'].'-'.$this->attributes['promo2'];
    }

    public function getUniversiteAttribute(){
      return empty($this->attributes['universite']) ? "LCA" :$this->attributes['universite'];
    }

    public function getEmploiAttribute(){
      return empty($this->attributes['emploi']) ? "Etudiant" : $this->attributes['emploi'];
    }

    public function getPaysAttribute(){
      return empty($this->attributes['pays']) ? \Country::get("CI") : \Country::get($this->attributes['pays']);
    }

    public function getCodePaysAttribute(){
      return empty($this->attributes["pays"]) ? "CI" : $this->attributes["pays"];
    }

    public function getStaffRoleAttribute(){
      $staff_role = $this->attributes["staff_role"];
      if($staff_role == "admin"){
        return "Administrateur";
      }else if($staff_role == "member"){
        return "Membre";
      }else{
        return "Membre";
      }
    }

    public function getStaffRoleCodeAttribute(){
      return $this->attributes["staff_role"];
    }

    public function get_photo(){
      return asset("asset/imgs/user_default_pic.png");
    }

  
}
