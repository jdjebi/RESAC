<?php

namespace App\Http\Controllers\Backend\Notification;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use Illuminate\Http\Request;

class CreateNotificationController extends Controller
{

    public function basic(Request $request){
       
        \Flash::add("Notification enregistrée");

        return redirect()->back();
    }


}
