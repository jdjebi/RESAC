<?php

namespace App\Http\Controllers\Resac\Actu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Features;
use App\Resac\Core\Posts\PostRenderer;
use App\Repositories\PostRepository;

class ActuController extends Controller
{

    public function index(PostRepository $post){


      $last_feature = Features::last();

      $title =  "Actualités";

      return view("app.actu",[
        'title' => $title,
        'last_feature' => $last_feature
      ]);
    }

}

?>