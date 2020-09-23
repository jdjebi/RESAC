<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SearchUserIndex;
use App\User;



class AuthController extends Controller
{

    public function logout(){
      \Resac\logout();
      return redirect()->route("home");
    }

    public function register(){
      
    }
}

?>
