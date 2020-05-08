<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Features;

class FeaturesController extends Controller
{
    public function dashboard(){

      $features = Features::all();

      $user = \Users::auth();

      return view("admin.features.dashboard",[
        'user' => $user,
        'features' => $features
      ]);

    }

    public function feature($id){
      /* D'une nouveauté */

      $feature = Features::findOrFail($id);

      dump($feature);

    }

    public function create(){

      $user = \Users::auth();

      return view('admin.features.create',[
        'user' => $user
      ]);

    }
}
