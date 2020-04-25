<?php

use Illuminate\Support\Facades\Route;

Route::get('/','AppController@index')->name('home');

Route::get('/explorer','ExploreController@index')->name('explorer');

Route::get('/nouveautes',"AppUpdateController@index")->name('dev_news');

Route::get('/connexion','AuthController@login')->name('login');

Route::match(['get', 'post'],'/inscription','AuthController@register')->name('register');


/* Application */

Route::match(['get', 'post'],'/actualités','ActuController@index')->name('actu');

Route::get('/profil','UserController@profil')->name('profil');

Route::get('/compte','UserController@account')->name('edit');

Route::match(['get', 'post'],'/parametres','UserController@account')->name('param');

Route::get('/deconnexion','AuthController@logout')->name('logout');


/* Administration */

Route::get('/v1/admin/connexion','AdminController@login')->name('admin');

Route::get('/v1/admin','AdminController@index')->name('admin_index');

Route::get('/v1/admin/manage/user','AdminController@user_manager')->name('admin_user_manager');

Route::match(['get', 'post'],'/v1/admin/manage/user/{user_id}','AdminController@user_profil')->name('admin_user_profil');


Route::get('/v1/admin/deconnexion','AdminController@logout')->name('admin_logout');

Route::post('/v1/api/admin/login','AdminController@api_login')->name('admin_api_login');

Route::get('/v1/api/get/v1/users','AdminController@api_get_user_list')->name('api_get_user_list');

/* Extra */
Route::get('v1/admin/rechercher',function(){


  if(isset($_GET['q']) and !empty($_GET['q'])){

    global $DB;

    extract($_GET);


    $q = $DB->prepare("SELECT id, nom, prenom FROM users WHERE nom LIKE '%$q%' || prenom LIKE '%$q%' ");


    $q->execute();
    $results = $q->fetchAll();
  }

  $user = \Users::auth();

  return view("admin.search",[
    "user" => $user,
    "results" => $results
  ]);

});


/* simple API */

Route::post('/v1/api/login', function () {

  $form = new LoginForm($_POST);
  $success = false;
  $is_error = false;

  if($form->is_validate()){
    $email = $form->get("email");
    $password = $form->get("password");
    $user = authenticate($email,$password);
    if($user){
      login($user);
      $success = true;
    }else{
      $form->add_error('global',"Adresse E-mail ou mot de passe incorrecte.");
    }
  }else{
    $form->add_error('global',"Veuillez remplir tous les champs.");
  }

  return json_encode([
    'is_error' => $form->is_errors(),
    'errors' => $form->get_errors(),
    'success' => $success
  ]);

})->name('api_login');
