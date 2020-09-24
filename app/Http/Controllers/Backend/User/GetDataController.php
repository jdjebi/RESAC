<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\User\MainData as UserMainDataResources;

use App\User;

class GetDataController extends Controller
{
 
    public function main_for_user_connected(Request $request){

        $user = UserAuth();
     
        return new UserMainDataResources(User::find($user->id));
    }
 
}

?>
