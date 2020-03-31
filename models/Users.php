<?php

class Users{

  private $db;
  public $id;
  public $nom;
  public $prenom;
  public $email;
  public $date_inscription;
  public $active;
  public $password;

  public function __construct($data){
    global $DB;
    $this->db = $DB;
    $this->id = $data["id"];
    $this->nom = $data["nom"];
    $this->prenom = $data["prenom"];
    $this->email = $data["email"];
    $this->date_inscription = $data["date_inscription"];
    $this->active = $data["active"];
    $this->password = $data["password"];
  }

  static function auth(){
    return Users::get(Auth::user());
  }

  static public function get($id){
    /* Le retour de données multiple n'est pas géré */
    global $DB;
    $sql = "SELECT * FROM users WHERE id = $id";
    $q = $DB->prepare($sql);
    $q->execute();
    $data = $q->fetch();

    if($data){
      return new Users($data);
    }
    return null;
  }

  static function all(){
    global $DB;
    $sql = "SELECT * FROM users";
    $q = $DB->prepare($sql);
    $q->execute();
    $data = $q->fetchAll();
    $users = [];
    foreach ($data as $user_data) {
      $users[] = new Users($user_data);
    }
    return $users;
  }

  static public function create($data){
    global $DB;
    $sql = "INSERT INTO users(nom,prenom,email,password) VALUES(:nom,:prenom,:email,:password)";
    $q = $DB->prepare($sql);
    $q->execute($data);
  }

  public function save(){
    $sql = "UPDATE users SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id";
    $q = $this->db->prepare($sql);
    $q->execute([
      "id" => $this->id,
      "nom" => $this->nom,
      "prenom" => $this->prenom,
      "email" => $this->email,
    ]);

  }

}

?>
