<?php

namespace App\Http\Controllers\UI\Web\Profil;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Resac\Core\Posts\PostRenderer;

class ProfilController extends Controller
{

    public function user(Request $request)
    {
        $user = UserAuth();

        $show_portofolio = false;

        $title = $user->fullname;

        $posts = Post::where("user",$user->id)->orderBy('date', 'desc')->get();

        $posts = PostRenderer::render_posts($posts);

        return view('app.profil.index_vue',[
            'title' => $title,
            'posts' => $posts,
            'user' => $user,
            'show_portofolio' => $show_portofolio
          ]);

    }

}

?>
