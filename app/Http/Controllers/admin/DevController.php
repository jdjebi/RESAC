<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Resac\Auth2;

class DevController extends Controller
{
    public function create_flash(){

      $user = Auth2::user();

      return view("admin.flash.creator",[
        'user' => $user,
      ]);

    }


}
