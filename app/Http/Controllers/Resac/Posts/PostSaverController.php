<?php

namespace App\Http\Controllers\Resac\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Resac\Auth2;


class PostSaverController extends Controller
{
    public function __invoke(Request $request){

        $user = UserAuth();

        if(!$request->filled('content')){
            \Flash::add("Votre publication est vide.","warning");       
        }else{
            $post = new Post([
                "user" => $user->id,
                "content" => $request->content,
                "validate" => false
            ]);
            $post->save();
        }

        return redirect()->route("actu");

    }
}
