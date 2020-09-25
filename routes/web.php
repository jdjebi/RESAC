<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SearchUserIndex;

use Illuminate\Support\Facades\Http;

Route::get('/annuaire','UI\Web\Extras\AnnuaireController')->name('annuaire');
Route::get('/nouveautes',"UI\Web\Extras\FeaturesController")->name('dev_news');
Route::get('/deconnexion','Backend\Auth\AuthController@logout')->name('logout');

Route::middleware("guest")->group(function(){
  Route::get('/','UI\Web\Index\IndexController');
  Route::get('/v2','UI\Web\Index\IndexController@index2')->name('home');
  Route::get('/connexion','UI\Web\Auth\AuthController@login')->name('login');
  Route::get('/inscription','UI\Web\Auth\AuthController@register')->name('register');

  Route::namespace("Resac\Auth")->group(function () {
    Route::get('reinitialiser/mot-de-passe','ForgotPasswordController')->name('app.reset.email');
    Route::post('reinitialiser/mot-de-passe','ValidatePasswordRequest');

    Route::get('password/reset/{token}','ResetPasswordController@get')->name('password.reset');
    Route::post('password/reset','ResetPasswordController@post')->name('app.reinit.password');
  });

  // Backend
  Route::post('/inscription','Backend\Auth\AuthController@register')->name('backend.register.member');

});

/* Application */

Route::middleware("auth")->group(function(){

  Route::get('/profil','UI\Web\Profil\ProfilController@user')->name('profil');
  Route::get('/profil/{id}','UI\Web\Profil\ProfilController@visitor')->where('id', '[0-9]+')->name('profil.visitor');


  Route::get('/profil2','UI\Web\Profil\ProfilController@user_new')->name('profil.user');
  // Backend
  Route::get('user/connected/main_data','Backend\User\GetDataController@main_for_user_connected')->name('backend.user.connected.main_data');

  Route::prefix('/compte')->group(function () {
    // Frontend
    Route::namespace('UI\Web\Compte')->group(function () {
      Route::get('','CompteController@general')->name('compte.index');
      Route::get('photo','CompteController@photo')->name('compte.photo');
      Route::get('mot-de-passe','CompteController@pass')->name('compte.pass');
    });
    // Backend
    Route::prefix('/update')->group(function () {
      Route::post('general','Backend\User\Update\GeneralController@update')->name('backend.compte.general');
      Route::post('pass','Backend\User\Update\PasswordController@update')->name('backend.compte.pass');
      Route::post('photo/change','Backend\User\Update\PhotoController@update')->name('backend.compte.photo.change');
      Route::get('photo/delete','Backend\User\Update\PhotoController@api_delete')->name('backend.compte.photo.delete');
    });
  });

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



/* Administration */

Route::prefix('/v1/admin')->group(function (){

  Route::get('connexion','UI\admin\Auth\AuthController@login')->name('admin')->middleware('admin.guest');

  Route::middleware('admin.login')->group(function (){

    Route::namespace("UI\admin")->group(function (){
      Route::get('','AdminController@index')->name('admin_index');
      Route::get('manage/users','User\ListController@user_manager')->name('admin_user_manager');
      Route::get('manage/user/action/','AdminController@delete_user')->name('admin_delete_user');
      Route::match(['get', 'post'],'manage/user/{user_id}','AdminController@user_profil')->where('user_id', '[0-9]+')->name('admin_user_profil');
      Route::get('deconnexion','Backend\Auth\AuthController@admin_logout')->name('admin_logout');
    });

    Route::namespace("Resac")->group(function (){
      Route::get('rechercher',"SearchController@admin")->name('admin_search');
    });

  });

});


Route::namespace('UI\admin')->group(function () {
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

  Route::get('get/v1/users','UI\admin\AdminController@api_get_user_list')->name('api_get_user_list');

  Route::post('admin/login','UI\admin\AdminController@api_login')->name('admin_api_login');
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
