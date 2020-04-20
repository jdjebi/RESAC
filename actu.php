<?php

require "src/init.php";

require "middleware/auth_back.php";

$user = Users::auth();

$content = "Lorem ipsum dolor sit amet.";

if(isset($_POST['new_post_test'])){
  Post::create([
    "user" => $user->id,
    "content" => $content
  ]);
}

if(isset($_POST['new_post'])){
  if(isset($_POST['content'])){
    if(!empty($_POST['content'])){
      Post::create([
        "user" => $user->id,
        "content" => $_POST['content']
      ]);
      Redirect::back();
    }else{
      Flash::add("Votre publication est vide.","warning");
    }
  }
}

$feed_posts = Post::all();

$title =  "Actualités";

render("actu",[
  'title' => $title,
  'user' => $user,
  'feed_posts' => $feed_posts
]);

?>
