<?php

use Illuminate\Support\Facades\Route;

Route::get('/','IndexController')->name('home');

Route::get('/explorer','ExploreController')->name('explorer');

Route::get('/nouveautes',"AppUpdateController")->name('dev_news');

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
Route::get('/v1/admin/deconnexion','AdminController@logout')->name('admin_logout');
Route::get('/v1/admin','AdminController@index')->name('admin_index');
Route::get('/v1/admin/manage/users','AdminController@user_manager')->name('admin_user_manager');
Route::match(['get', 'post'],'/v1/admin/manage/user/{user_id}','AdminController@user_profil')->where('user_id', '[0-9]+')->name('admin_user_profil');
Route::get('/v1/admin/manage/user/action/','AdminController@delete_user')->name('admin_delete_user');

Route::namespace('admin')->group(function () {
  Route::name('admin.')->group(function () {

    Route::prefix('/v1/admin/manager/')->group(function () {
      Route::get('pubs','PubsController@dashboard')->name('pubs_dashboard');
      Route::get('pubs/{id}','PubsController@pub')->where('id', '[0-9]+')->name('manage_pub');
      Route::get('pubs/{id:int}/certification','PubsController@validate_pub')->name('validate_pub');
    });

    Route::name('api.')->group(function () {
      Route::prefix('/v1/api/admin/')->group(function () {

        Route::get('pubs/all','PubsController@api_get_all')->name('pubs_all');

      });
    });

  });
});

Route::get('/v1/admin/rechercher',function(){

  $search_query = "";
  $results = [];

  if(isset($_GET['q']) and !empty($_GET['q'])){
    $search_query = $_GET['q'];
    $search_results = Search::user_engine($search_query);
    foreach ($search_results as $data) {
      $results[] = new Users($data);
    }
  }else{
    Flash::add("Veuillez renseigner le nom de l'utilisateur à rechercher.",'warning');
  }

  $user = \Users::auth();

  $title = "Rechercher: ".$search_query;

  return view("admin.search",[
    "search_query" => $search_query,
    "title" => $title,
    "user" => $user,
    "results" => $results
  ]);

})->name('admin_search');


Route::post('/v1/api/admin/login','AdminController@api_login')->name('admin_api_login');

Route::get('/v1/api/get/v1/users','AdminController@api_get_user_list')->name('api_get_user_list');



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
