<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use Resac\Auth2;
use App\Models\Post;
use Illuminate\Http\Request;

class CertificationController extends Controller
{

    function start(Request $request, $id, $certif_author){

        $post = Post::find($id);
        $post->validate_status = Post::EN_ATTENTE;
        $post->save();
        return "start";
    }

    function set(Request $request, $id, $certif_author){
        return "set";
        $post = Post::find($id);
        $post->validate_status = Post::ACCEPTE;
        $post->validate_by = $certif_author;
        $post->validate_at = new Datetime();
    }

    function cancel(Request $request, $id, $certif_author){
        return "start";
        $post->validate_status = Post::EN_ATTENTE;
        $post->validate_by = $certif_author;
        $post->validate_at = new Datetime();
    }

}
