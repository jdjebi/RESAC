<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\Post\PostCollection as PostResources;
use App\Resac\Core\Posts\PostRenderer;

class GetPostController extends Controller
{
    public function user_post(Request $request, $id)
    {
        $posts = Post::where("user",$id)->orderBy('date','desc')->get();

        if($request->filled('content')){
            if($request->content == "rich-text"){
                $posts = PostRenderer::render_posts($posts);
            }
        }


        return new PostResources($posts);
    }
}
