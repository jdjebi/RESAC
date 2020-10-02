<?php

namespace App\Repositories;

use App\Resac\Core\Posts\PostRenderer;

class PostRepository{

    public function get_all(){
        $posts = \App\Models\Post::select("*")->orderBy('date', 'desc')->get();
        $posts = PostRenderer::render_posts($posts);
        return $posts;
    }

}