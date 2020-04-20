<?php

class Post extends Model {

  static public $table = "pub_v1";

  public $id;
  public $user;
  public $scope;
  public $type;
  public $date;
  public $content;
  public $version;

  public function __construct($data){
    global $DB;
    $this->db = $DB;

    $this->id = $data["id"];
    $this->user = Users::get($data["user"]);
    $this->user_id = $data["user"];
    $this->scope = $data["scope"];
    $this->type = $data["type"];
    $this->date = $data["date"];
    $this->content = $data["content"];
    $this->version = $data["version"];
  }

  static public function get($id){
    /* Le retour de données multiple n'est pas géré */
    global $DB;
    $sql = "SELECT * FROM $this->table WHERE id = $id";
    $q = $DB->prepare($sql);
    $q->execute();
    $data = $q->fetch();
    if($data){
      return new Post($data);
    }
    return null;
  }

  static function all(){
    global $DB;
    $table = Post::$table;
    $sql = "SELECT * FROM $table ORDER BY date DESC";
    $q = $DB->prepare($sql);
    $q->execute();
    $posts_data = $q->fetchAll();
    $posts = [];

    foreach ($posts_data as $data) {
      $posts[] = new Post($data);
    }
    return $posts;
  }

  static public function create($data){
    global $DB;
    $table = Post::$table;
    $sql = "INSERT INTO $table(user,content) VALUES(:user,:content)";
    $q = $DB->prepare($sql);
    $q->execute($data);
  }

}

?>
