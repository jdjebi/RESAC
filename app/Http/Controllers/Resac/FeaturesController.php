<?php

namespace App\Http\Controllers\Resac;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Features;

class FeaturesController extends Controller
{
  public function __invoke()
  {
      $user = null;

      if(\Auth::check()){
        $user = \Users::auth();
      }

      $features = Features::get_all();

      $title2 = "Nouveautés";

      return view('app.news.timeline',[
        'user' => $user,
        'features' => $features,
        'title2' => $title2,
      ]);
  }
}

?>
