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
Route::get('/', 'IndexController@index');

Route::get('article/{id}', 'ShowController@show')->name('articleShow');


Route::get('post/add','SaveController@add');
Route::post('post/add','SaveController@save')->name('postSave');
Route::delete('post/delete/{post}',function($post){
    $post_tmp = App\Post::where('id',$post)->first();
    $post_tmp->delete();
    return redirect('/');
})->name('postDelete');
Route::get('post/edit/{id}','EditController@edit')->name('editShow');
Route::post('post/edit/{id}','EditController@update')->name('postUpdate');


//Работа с пользователями

Route::delete('admin/delete/{user}',function($user){
    $user_tmp = App\User::where('id',$user)->first();
    $user_tmp->delete();
    return redirect('admin');
})->name('userDelete');
Route::get('admin/edit/{id}','UserEditController@edit')->name('usereditShow');
Route::post('admin/edit/{id}','UserEditController@update')->name('userpostUpdate');

Route::get('admin/user-{id}/edit','AccountController@accedit')->name('accountEdit');
Route::post('admin/user-{id}/edit','AccountController@accupdate')->name('accountUpdate');

Route::get('admin/user-{id}','AccountController@account')->name('userAccount');

Route::post('admin/user-{id}','UploadAvatar@accountAvatar')->name('uploadAva');

Route::get('admin/delete-avatar/user-{id}','ChangeAvatar@deleteAvatar')->name('avatarDelete');

Route::get('/admin','AdminController@admin');
Route::get('/admin-content','AdminController@content');
Route::get('/admin-user','AdminController@users');


Route::get('/admin-multimedia','AdminController@multimedia');
Route::post('/admin-multimedia/add','AdminController@addMultimedia')->name('addImage');
Route::get('/admin-multimedia/delete','AdminController@deleteIMG')->name('deleteIMG');


Route::get('/admin-files','FileController@openFiles');
Route::post('/admin-files/add','FileController@addNewFile')->name('addFile');
Route::get('/admin-files/delete/{fileid}','FileController@deleteFile')->name('deleteFile');


Route::get('/admin-pages','PageController@openPages');
Route::delete('admin-pages/delete/{page}',function($page){
    $page_tmp = App\Page::where('id',$page)->first();
    $page_tmp->delete();
    return redirect('/');
})->name('pageDelete');

Auth::routes();

Route::get('/', 'IndexController@index');
// Маршруты аутентификации...
Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout');

// Маршруты регистрации...
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register', 'Auth\RegisterController@register');

//Маршруты восстановления пароля
//Route::post('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');

//PAGES
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');
Route::get('/addPage','PageController@addPage');
Route::post('/addPage','PageController@savePage')->name('savePage');;