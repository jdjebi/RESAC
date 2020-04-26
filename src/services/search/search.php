<?php

class Search{

  static function user_engine($search_query){
    global $DB;
    $query = $DB->prepare("SELECT * FROM users WHERE nom LIKE '%$search_query%' || prenom LIKE '%$search_query%' ");
    $query->execute();
    $results = $query->fetchAll();
    return $results;
  }

}

?>
