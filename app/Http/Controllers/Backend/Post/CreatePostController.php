<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use App\Models\Post;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{

    public function libre(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required'
        ]);

        $user = UserAuth();

        $post = new Post([
            "user" => $user->id,
            "content" => $request->content,
            "validate" => false
        ]);

        \Flash::add("Publication enregistrée");

        $post->save();

        return redirect()->route("admin.manage_pub",$post->id);
    }

}
