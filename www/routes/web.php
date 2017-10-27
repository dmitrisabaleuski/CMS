<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/***** MAIN PAGE   *****/
Route::get('/', 'MainPageController@showMainPage');
Route::get('article/{id}', 'MainPageController@showArticle')->name('articleShow');

/***** ADMIN PAGE *****/
Route::get('/admin','AdminController@admin');
Route::get('/admin-pages','AdminController@viewPages');
Route::get('/admin-articles','AdminController@viewArticles');
Route::get('/admin-user','AdminController@viewUsers');
Route::get('/admin-multimedia','AdminController@viewMultimedia');
Route::get('/admin-files','AdminController@viewFiles');


/***** USERS *****/
Route::get('admin/user-{id}','AccountController@account')->name('userAccount');
Route::post('admin/user-{id}','AccountController@accountAvatar')->name('uploadAvatar');
Route::get('admin/delete-avatar/user-{id}','AccountController@deleteAvatar')->name('avatarDelete');
Route::get('admin/user-{id}/edit','AccountController@accountEdit')->name('accountEdit');
Route::post('admin/user-{id}/edit','AccountController@accountUpdate')->name('accountUpdate');
Route::get('admin/edit/{id}','AccountController@userEdit')->name('userEdit');
Route::post('admin/edit/{id}','AccountController@userUpdate')->name('userUpdate');
Route::delete('admin/delete/{user}',function($user){
    $user_tmp = App\Model\User::where('id',$user)->first();
    $user_tmp->delete();
    return redirect('admin');
})->name('userDelete');

/***** POST *****/
Route::get('articleAdd','ArticleController@articleAdd');
Route::post('articleAdd','ArticleController@articleSave')->name('articleSave');
Route::delete('article/delete/{postId}',function($postId){
    $post_tmp = App\Model\Article::where('id',$postId)->first();
    $post_tmp->delete();
    return redirect('admin-articles');
})->name('articleDelete');
Route::get('article/edit/{id}','ArticleController@articleEdit')->name('articleEdit');
Route::post('article/edit/{id}','ArticleController@articleUpdate')->name('articleUpdate');


/***** PAGE *****/
Route::get('/addPage','PageController@addPage');
Route::post('/addPage','PageController@savePage')->name('savePage');;
Route::delete('admin-pages/delete/{page}',function($page){
    $page_tmp = App\Model\Page::where('id',$page)->first();
    $page_tmp->delete();
    return redirect('/');
})->name('pageDelete');

Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');

/***** MULTIMEDIA *****/
Route::post('/admin-multimedia/add','MultimediaController@addMultimedia')->name('addMultimedia');
Route::get('admin-multimedia/delete','MultimediaController@deleteMultimedia')->name('deleteMultimedia');

/***** FILES *****/
Route::post('/admin-files/add','FileController@addNewFile')->name('addFile');
Route::get('/admin-files/delete/{fileid}','FileController@deleteFile')->name('deleteFile');

/***** USERS AUTHORIZATION *****/
Auth::routes();
// Маршруты аутентификации...
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout');

// Маршруты регистрации...
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');
