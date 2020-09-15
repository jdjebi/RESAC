<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SearchUserIndex;

use Illuminate\Support\Facades\Http;


Route::middleware("guest")->group(function(){

  Route::get('/','UI\Web\Index\IndexController');
  Route::get('/v2','UI\Web\Index\IndexController@index2')->name('home');

  Route::get('/connexion','AuthController@login')->name('login');

  Route::match(['get', 'post'],'/inscription','AuthController@register')->name('register');

  Route::namespace("Resac\Auth")->group(function () {
    Route::get('reinitialiser/mot-de-passe','ForgotPasswordController')->name('app.reset.email');
    Route::post('reinitialiser/mot-de-passe','ValidatePasswordRequest');

    Route::get('password/reset/{token}','ResetPasswordController@get')->name('password.reset');
    Route::post('password/reset','ResetPasswordController@post')->name('app.reinit.password');
  });

});

Route::get('/annuaire','UI\Web\Extras\AnnuaireController')->name('annuaire');

Route::get('/nouveautes',"UI\Web\Extras\FeaturesController")->name('dev_news');

/* Application */

Route::middleware("auth")->group(function(){

  Route::get('/feed','ActuController@feed')->name('app.feed');

  Route::get('/profil','UserController@profil')->name('profil');

  Route::get('/profil/{id}','UserController@profil2')->name('visitor_profil');

  Route::match(['get', 'post'],'/compte','UserController@account')->name('edit');


  Route::prefix('/compte2')->group(function () {
    
    Route::match(['get', 'post'],'','UI\Web\Compte\CompteController@general')->name('compte.index');
    Route::get('photo','UI\Web\Compte\CompteController@photo')->name('compte.photo');
    Route::get('mot-de-passe','UI\Web\Compte\CompteController@pass')->name('compte.pass');
  
    Route::prefix('/update')->group(function () {
      Route::post('general','Backend\User\GeneralController@update')->name('backend.compte.general');
    });

  });

  Route::match(['get', 'post'],'/parametres','UserController@account')->name('param');

  Route::match(['get', 'post'],'/actualites','Resac\Actu\ActuController@index')->name('actu');

  Route::get('rechercher',"Resac\SearchController@user_for_app")->name('app.search');

  Route::match(['get', 'post'],'publications/c/libre',"Resac\PostController@create_free_post")->name('app.post.create.free');

  Route::get('publications',"Resac\PostController@index")->name('app.post');

  Route::get('publications/{id}',"Resac\Posts\PostViewerController@show")->where('id', '[0-9]+')->name('app.post.show');

  Route::get('publications?not-certified',"Resac\PostController@index")->name('app.post.not_certified');

  Route::get('publications/creer',"Resac\PostController@create")->name('app.post.hub');

  Route::get('publications/delete/{id}',"Resac\Posts\PostDeleteController")->where('id', '[0-9]+')->name('app.post.delete');

  Route::post('publications/publier',"Resac\Posts\PostSaverController")->name('app.post.publish');

});

Route::get('/deconnexion','AuthController@logout')->name('logout');


/* Administration */

Route::prefix('/v1/admin')->group(function (){

  Route::get('connexion','AdminController@login')->name('admin')->middleware('admin.guest');

  Route::middleware('admin.login')->group(function (){

    Route::get('','AdminController@index')->name('admin_index');

    Route::get('deconnexion','AdminController@logout')->name('admin_logout');

    Route::get('manage/users','AdminController@user_manager')->name('admin_user_manager');

    Route::get('manage/user/action/','AdminController@delete_user')->name('admin_delete_user');

    Route::match(['get', 'post'],'manage/user/{user_id}','AdminController@user_profil')->where('user_id', '[0-9]+')->name('admin_user_profil');

    Route::namespace("Resac")->group(function (){
      Route::get('rechercher',"SearchController@admin")->name('admin_search');
    });

  });

});


Route::namespace('admin')->group(function () {
  Route::name('admin.')->group(function () {

    Route::middleware('admin.login')->group(function (){

      Route::prefix('/v1/admin/manager/')->group(function () {

        /* Publications */
        Route::get('pubs','PubsController@dashboard')->name('pubs_dashboard');
        Route::get('pubs/{id}','PubsController@pub')->where('id', '[0-9]+')->name('manage_pub');
        Route::get('pubs/{id}/certification','PubsController@validate_pub')->name('validate_pub');


        /* Nouveautés */
        Route::get('nouveautes','FeaturesController@dashboard')->name('feature.all');

        Route::get('nouveautes/{id}','FeaturesController@feature')->where('id', '[0-9]+')->name('feature.show');
        Route::post('nouveautes/{id}','FeaturesController@update')->where('id', '[0-9]+');

        Route::get('nouveautes/creer','FeaturesController@create')->name('feature.create');
        Route::post('nouveautes/creer','FeaturesController@store');

        Route::get('nouveautes/delete/{id}','FeaturesController@delete')->where('id', '[0-9]+')->name('feature.delete');


        /* Index de recherche utilisateur */
        Route::get('webengine/index','WebEngineIndexController@show')->name('webengine.show');
        Route::get('webengine/index/generate','WebEngineIndexController@generate_index')->name('webengine.generate_index');
        Route::get('webengine/index/clear','WebEngineIndexController@clear_index')->name('webengine.clear_index');

      });

      Route::prefix('/v2/admin/')->group(function () {
        Route::get('dev/flash/creator','DevController@create_flash')->name('dev.create_flash');
      });

    });


    Route::name('api.')->group(function () {
      Route::prefix('/v1/api/admin/')->group(function () {
        Route::get('pubs/all','PubsController@api_get_all')->name('pubs_all');
      });
    });

  });
});

/* simple API */

Route::prefix('v1/api')->group(function () {

  Route::namespace('Resac\Api')->group(function () {

      Route::post('login','ApiController@login')->name('api_login');

  });

  Route::get('get/v1/users','AdminController@api_get_user_list')->name('api_get_user_list');

  Route::post('admin/login','AdminController@api_login')->name('admin_api_login');
});

/* Routes de test */


Route::get('test_index',function(){

  $user = App\User::create([
    "nom" => 'test'.Str::random(4),
    "prenom" => 'test'.Str::random(4),
    "email" => 'test'.Str::random(4).'@gmail.com',
    "password" => Hash::make('123'),
    "version" => 2 // version actuelle des comptes
  ]);

  SearchUserIndex::register($user); // L'utilisateur est enregistré dans l'index de recherche

  return 'test';

});


Route::get('test/storage_driver',function(){

  $file_exist = Storage::disk('dropbox')->exists('op.jpg');;
  
  if($file_exist)
    return "Test de l'interaction avec dropbox OK";
  else
    return "Test de l'interaction avec dropbox échoué";
  
});
