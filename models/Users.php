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

  /* v2 - resac-v2 */
  public $promo1;
  public $promo2;

  // Numéros
  public $numero;

  // Lieu d'habitation
  public $pays;
  public $ville;
  public $commune;

  // Université et Emploi
  public $emploi;
  public $universite;

  // Liens
  public $linkedin;
  public $facebook;
  public $instagram;
  public $twitter;

  public function __construct($data){
    global $DB;
    $this->db = $DB;

    $this->id = $data["id"];
    $this->password = $data["password"];
    $this->active = $data["active"];
    $this->date_inscription = $data["date_inscription"];

    // Général
    $this->nom = $data["nom"];
    $this->prenom = $data["prenom"];
    $this->email = $data["email"];
    $this->numero = $data["numero"];

    // Lieu d'habitation
    $this->pays = $data["pays"];
    $this->ville = $data["ville"];
    $this->commune = $data["commune"];

    // Parcours
    $this->promo1 = $data["promo1"];
    $this->promo2 = $data["promo2"];

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

  static public function email_is_unique($email){
    global $DB;
    $q = $DB->prepare("SELECT id FROM users WHERE email = ?");
    $q->execute([$email]);
    if($q->fetch())
      return false;
    else
      return true;
  }

  public function save(){
    $sql = "
      UPDATE users SET
      nom = :nom,
      prenom = :prenom,
      email = :email,
      numero = :numero,
      pays = :pays,
      ville = :ville,
      commune = :commune,
      promo1 = :promo1,
      promo2 = :promo2,
      password = :password
      WHERE id = :id
    ";

    $q = $this->db->prepare($sql);

    $q->execute([
      "id" => $this->id,
      "nom" => $this->nom,
      "prenom" => $this->prenom,
      "email" => $this->email,
      "numero" => $this->numero,
      "pays" => $this->pays,
      "ville" => $this->ville,
      "commune" => $this->commune,
      "promo1" => $this->promo1,
      "promo2" => $this->promo2,
      "password" => $this->password
    ]);

  }

}

?>
