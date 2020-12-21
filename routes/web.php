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

Route::get('extras/bienvenue','UI\Extras\Register')->name('extras.register');

Route::middleware("guest")->group(function(){
  Route::get('/','UI\Web\Index\IndexController');
  Route::get('/demo','UI\Web\Index\IndexController@index2')->name('home');
  Route::get('/connexion','UI\Web\Auth\AuthController@login')->name('login');
  Route::get('/inscription','UI\Web\Auth\AuthController@register')->name('register');

  Route::namespace("Backend\Auth\Password")->group(function () {
    Route::get('reinitialiser/mot-de-passe','ForgotPasswordController')->name('app.reset.email');
    Route::post('reinitialiser/mot-de-passe','ValidatePasswordRequest');
    Route::get('password/reset/{token}','ResetPasswordController@get')->name('password.reset');
    Route::post('password/reset','ResetPasswordController@post')->name('app.reinit.password');
  });

  // Backend
  Route::post('/inscription','Backend\Auth\RegisterController')->name('backend.register.member');
});

/* Application */

Route::middleware("auth")->group(function(){

  Route::get('/profil','UI\Web\Profil\ProfilController@user')->name('profil');
  Route::get('/profil/{id}','UI\Web\Profil\ProfilController@visitor')->where('id', '[0-9]+')->name('profil.visitor');
  Route::get('/profil2','UI\Web\Profil\ProfilController@user_new')->name('profil.user');

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

  Route::match(['get', 'post'],'/actualites','UI\Web\Actu\ActuController@index')->name('actu');

  Route::get('rechercher',"Resac\SearchController@user_for_app")->name('app.search');

  Route::match(['get', 'post'],'publications/c/libre',"Resac\PostController@create_free_post")->name('app.post.create.free');

  Route::get('publications',"Resac\PostController@index")->name('app.post');
  Route::get('publications/{id}',"Resac\Posts\PostViewerController@show")->where('id', '[0-9]+')->name('app.post.show');
  Route::get('publications?not-certified',"Resac\PostController@index")->name('app.post.not_certified');
  Route::get('publications/creer',"Resac\PostController@create")->name('app.post.hub');
  Route::get('publications/delete/{id}',"Resac\Posts\PostDeleteController")->where('id', '[0-9]+')->name('app.post.delete');
  Route::post('publications/publier',"Backend\Post\CreatePostController@from_member")->name('app.post.publish');
  

});


/* Administration */

Route::prefix('/v1/admin')->group(function (){

  Route::get('connexion','UI\admin\Auth\AuthController@login')->name('admin')->middleware('admin.guest');

  Route::middleware('admin.login')->group(function (){

    Route::namespace("UI\admin")->group(function (){
      Route::get('','AdminController@index')->name('admin_index');
      Route::get('users','User\UserController@index')->name('admin.users.index');
      Route::get('user/action/','AdminController@delete_user')->name('admin_delete_user');
      Route::get('users/{id}','User\UserController@show')->where('id', '[0-9]+')->name('admin_user_profil');
      Route::get('users/{id}/compte','User\UserController@account')->where('id', '[0-9]+')->name('admin.users.account');
      Route::get('roles-permissions/','User\RolesAndPermissionsController@index')->name('admin.user.roles');
      Route::get('roles-permissions/roles/{id}/','User\RolesAndPermissionsController@show')->where('id', '[0-9]+')->name('admin.roles.show');
    });

    Route::get('deconnexion','Backend\Auth\AuthController@admin_logout')->name('admin.logout');

    Route::namespace("Resac")->group(function (){
      Route::get('rechercher',"SearchController@admin")->name('admin_search');
    });

  });

});

Route::name('admin.')->group(function () {

  // Frontend
  Route::namespace('UI\admin')->group(function () {
  
    Route::middleware('admin.login')->group(function (){
      Route::prefix('/v1/admin/')->group(function () {

        Route::get('notifications','Notifications\NotificationsController@show')->name('notifications.show');

        /* Publications */
        Route::prefix('publications')->group(function(){
          Route::namespace('Posts')->group(function () {
            Route::get('','PostsController@dashboard')->name('pubs_dashboard');
            Route::get('my','PostsController@my_posts')->name('post.my_posts');
            Route::get('{id}','PostsController@pub')->where('id', '[0-9]+')->name('manage_pub');
            Route::get('{id}/certification','PostsController@validate_pub')->name('validate_pub');
            Route::get('creer','CreatePostController@menu')->name('post.create');
            Route::get('creer/libre','CreatePostController@libre')->name('post.create.libre');
          });
        });

        /* Nouveautés */
        Route::get('nouveautes','Features\FeaturesController@dashboard')->name('feature.all');
        Route::get('nouveautes/{id}','Features\FeaturesController@feature')->where('id', '[0-9]+')->name('feature.show');
        Route::post('nouveautes/{id}','Features\FeaturesController@update')->where('id', '[0-9]+');

        Route::get('nouveautes/creer','Features\FeaturesController@create')->name('feature.create');
        Route::post('nouveautes/creer','Features\FeaturesController@store');
        Route::get('nouveautes/delete/{id}','Features\FeaturesController@delete')->where('id', '[0-9]+')->name('feature.delete');

        /* Index de recherche utilisateur */
        Route::get('webengine/index','WebEngineIndexController@show')->name('webengine.show');
        Route::get('webengine/index/generate','WebEngineIndexController@generate_index')->name('webengine.generate_index');
        Route::get('webengine/index/clear','WebEngineIndexController@clear_index')->name('webengine.clear_index');

        /* Notifications */
        Route::get('dev/notifications','Dev\Notifications\NotifController@create')->name('dev.notification.create');

      });

      Route::prefix('/v1/admin/')->group(function () {
        Route::get('dev/flash/creator','DevController@create_flash')->name('dev.create_flash');
      });

    });


    Route::name('api.')->group(function () {
      Route::prefix('/v1/api/admin/')->group(function () {
        Route::get('pubs/all','Posts\PostsController@api_get_all')->name('pubs_all');
      });
    });

  });

});

// Backend
Route::middleware('admin.login')->group(function (){

  Route::prefix('/v1/admin/')->group(function () {
    Route::namespace('Backend\Post')->group(function () {
      Route::post('creer/libre','CreatePostController@libre')->name('backend.post.create.libre');
    });
  });

  Route::namespace('Backend\Post')->group(function () {
    Route::post('backend/post/create',"CreatePostController@from_member")->name('backend.post.create.from_member');
    Route::get('backend/post/delete/{id}','PostDeleteController@my_post')->name('backend.post.delete.my_post');
  });

  /* Notifications */
  Route::get('backend/notification/create','Backend\Notification\CreateNotificationController@basic')->name('backend.notification.create');
  Route::get('backend/notification/delete/auth/all','Backend\Notification\DeleteNotificationController@basic')->name('backend.notification.auth.delete.all');
  Route::get('backend/notification/web/delete/{uuid}','Backend\Notification\StatusNotificationController@delete')->name('backend.notification.web.delete');
  Route::get('backend/notification/web/mark/{uuid}','Backend\Notification\StatusNotificationController@mark_as_read')->name('backend.notification.web.mark_as_read');


});


/* API */

// User
Route::get('user/connected/main_data','Backend\User\GetDataController@main_for_user_connected')->name('backend.user.connected.main_data');
Route::get('user/all/manage_data','Backend\User\GetDataController@manage_data')->name('backend.api.user.all.manage_data');
Route::get('users/{id}/roles','Backend\User\RolesPermissions@get_roles')->where('id', '[0-9]+')->name('backend.users.roles.get');
Route::put('users/{id}/roles','Backend\User\RolesPermissions@put_roles')->where('id', '[0-9]+')->name('backend.users.roles.put');


// Post
Route::get('posts/','Backend\Post\GetPostController@all_posts')->name('backend.api.post.get.all');
Route::get('posts/user/{id}','Backend\Post\GetPostController@user_posts')->where('id', '[0-9]+')->name('backend.api.post.user');
Route::get('posts/published','Backend\Post\GetPostController@published')->name('backend.api.post.get.published');

Route::get('posts/{id}','Backend\Post\GetPostController@by_id')->where('id', '[0-9]+')->name('backend.api.post.get.by_id');
Route::get('posts/{id}/lock','Backend\Post\PostStateController@lock')->where('id', '[0-9]+')->name('backend.api.post.state.lock');
Route::get('posts/{id}/unlock','Backend\Post\PostStateController@unlock')->where('id', '[0-9]+')->name('backend.api.post.state.unlock');
Route::get('posts/{id}/archive','Backend\Post\PostStateController@archive')->where('id', '[0-9]+')->name('backend.api.post.state.archive');
Route::get('posts/{id}/publish','Backend\Post\PostStateController@publish')->where('id', '[0-9]+')->name('backend.api.post.state.publish');

Route::get('posts/{id}/certif/start/by/{certif_author}','Backend\Post\CertificationController@start')->name('backend.api.post.certif.start');
Route::get('posts/{id}/certif/set/by/{certif_author}','Backend\Post\CertificationController@set')->name('backend.api.post.certif.set');
Route::get('posts/{id}/certif/cancel/by/{certif_author}','Backend\Post\CertificationController@cancel')->name('backend.api.post.certif.cancel');

Route::post('posts/{id}/update','Backend\Post\PostUpdateController@content')->where('id', '[0-9]+')->name('backend.api.post.update');
Route::get('posts/{id}/delete','Backend\Post\PostDeleteController@api')->where('id', '[0-9]+')->name('backend.api.post.delete');

// Roles et permissions
Route::get('roles/','Backend\Role\RoleController@index')->name('backend.roles.index');
Route::post('roles/create','Backend\Role\RoleController@create')->name('backend.roles.create');
Route::get('roles/{id}/','Backend\Role\RoleController@show')->where('id', '[0-9]+')->name('backend.roles.show');
Route::put('roles/{id}/','Backend\Role\RoleController@update')->where('id', '[0-9]+')->name('backend.roles.update');
Route::delete('roles/{id}/','Backend\Role\RoleController@delete')->where('id', '[0-9]+')->name('backend.roles.delete');

Route::get('permissions/','Backend\Permission\PermissionController@index')->name('backend.permissions.index');
Route::post('permissions/create','Backend\Permission\PermissionController@create')->name('backend.permissions.create');
Route::delete('permissions/{id}/','Backend\Permission\PermissionController@delete')->where('id', '[0-9]+')->name('backend.permissions.delete');

// Auth
Route::post('backend/login','Backend\Auth\LoginController')->name('api.login');
Route::post('backend/login/admin','Backend\Auth\AuthController@login')->name('api.admin.login');

/* Routes de test */

Route::get('test/storage_driver',function(){

  $file_exist = Storage::disk('dropbox')->exists('op.jpg');;
  
  if($file_exist)
    return "Test de l'interaction avec dropbox OK";
  else
    return "Test de l'interaction avec dropbox échoué";
  
});
