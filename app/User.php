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
      return asset("asset/imgs/user_default_pic.png");
    }

    public function getPromoAttribute(){
      return empty($this->promo1) || empty($this->promo2) ? "xxxx-xxxx" : $this->promo1.'-'.$this->promo2;
    }

    public function getUniversiteAttribute(){
      return empty($this->universite) ? "LCA" : $this->universite;
    }

    public function getEmploiAttribute(){
      return empty($this->emploi) ? "Etudiant" : $this->emploi;
    }

    public function getPaysAttribute(){
      return empty($this->pays) ? \Country::get("CI") : \Country::get($this->pays);
    }

    public function getCodePaysAttribute(){
      return empty($this->pays) ? "CI" : $this->attributes["pays"];
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

    public function get_photo(){
      return asset("asset/imgs/user_default_pic.png");
    }

    public function getCountPostsAttribute(){
      return Post::where('user',$this->attributes['id'])->count();
    }

    public function getCountCertifiedPostsAttribute(){
      return Post::where('user',$this->attributes['id'])->where('validate',true)->count();
    }

    public function getCountNotCertifiedPostsAttribute(){
      return Post::where('user',$this->attributes['id'])->where('validate',false)->count();
    }
}
