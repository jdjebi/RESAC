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
  public $promo;

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
    $this->promo = $data["promo"];

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
    $sql = "UPDATE users SET nom = :nom, prenom = :prenom, email = :email, pays = :pays, numero = :numero WHERE id = :id";
    $q = $this->db->prepare($sql);
    $q->execute([
      "id" => $this->id,
      "nom" => $this->nom,
      "prenom" => $this->prenom,
      "email" => $this->email,
      "pays" => $this->pays,
      "numero" => $this->numero,
    ]);

  }

}

?>
