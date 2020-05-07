<?php

namespace App\Http\Controllers\Resac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  public function admin(){

    $search_query = "";
    $results = [];

    if(isset($_GET['q']) and !empty($_GET['q'])){
      $search_query = $_GET['q'];
      $search_results = \Search::user_engine($search_query);
      foreach ($search_results as $data) {
        $results[] = new \Users($data);
      }
    }else{
      \Flash::add("Veuillez renseigner le nom de l'utilisateur à rechercher.",'warning');
    }

    $user = \Users::auth();

    $title = "Rechercher: ".$search_query;

    return view("admin.search",[
      "search_query" => $search_query,
      "title" => $title,
      "user" => $user,
      "results" => $results
    ]);

  }
}
