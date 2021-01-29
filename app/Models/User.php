<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;
use Spatie\Permission\Traits\HasRoles;
use App\RESAC\Core\Security\RolesFactory;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $table = 'users';

    protected $fillable = ['nom','prenom','email','password','version'];

    public function getFullNameAttribute()
    {
        return "{$this->attributes['nom']} {$this->attributes['prenom']}";
    }

    public function getIsModerateurAttribute(){
      return ($this->attributes['is_staff'] && $this->attributes['staff_role'] == "admin");
    }

    public function getIsAdminAttribute(){
      return ($this->attributes['is_staff'] && $this->attributes['staff_role'] == "admin");
    }

    public function getPhotoAttribute(){

      if($this->attributes['photo'] != ""){
        if(env('APP_ENV') == "web"){
          $url = \Storage::disk('dropbox')->url($this->attributes['photo']);
        }
        else{
          $url = "storage/{$this->attributes['photo']}";
        }
      }
      else{
        $url = asset("asset/imgs/user_default_pic.png"); 
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

    public function getEquipeAttribute(){
      $is_staff = $this->attributes["is_staff"];
      $is_superadmin = $this->attributes["is_superadmin"];
      if($is_staff || $is_superadmin){
        return "Equipe";
      }else{
        return "Non équipe";
      }
    }

    public function getRolesAliasAttribute(){
      return RolesFactory::GetRoles($this->getRoleNames());
    }

    public function getStaffRoleCodeAttribute(){
      return $this->attributes["staff_role"];
    }

    public function getHavePhotoAttribute(){

      if($this->attributes['photo'] != ""){
        return 1;
      }
      else{
        return 0; 
      }   
      
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

    /* Notifications */

    public function getCountNotificationsAttribute(){
      /* Compte de le nombre de notification non lu et non vue */
      $unreadNotifications_count = 0;
      $unreadNotifications = $this->unreadNotifications;
      foreach($unreadNotifications as $n){
        if($n->seen_at==NULL){
          ++$unreadNotifications_count;
        }
      }
      return $unreadNotifications_count;
    }

    static function is_staff_user(){
      return \Resac\Auth2::is_admin_logged();
    }


    static function email_is_unique($email){
      $u = User::where('email',$email)->get();
      if($u)
        return false;
      else
        return true;
    }

    static function check_if_repeat($field,$val){
      // Vérifie si une valeur se repète plusieurs dans le table des utilisateur
      $c = User::where($field,$val)->count();
      return $c > 0;
    }
}
