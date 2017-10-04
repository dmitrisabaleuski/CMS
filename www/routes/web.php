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


Route::get('page/add','SaveController@add');
Route::post('page/add','SaveController@save')->name('postSave');
Route::delete('page/delete/{post}',function($post){
    $post_tmp = App\Post::where('id',$post)->first();
    $post_tmp->delete();
    return redirect('/');
})->name('postDelete');
Route::get('page/edit/{id}','EditController@edit')->name('editShow');
Route::post('page/edit/{id}','EditController@update')->name('postUpdate');


//Работа с пользователями

Route::delete('admin/delete/{user}',function($user){
    $user_tmp = App\User::where('id',$user)->first();
    $user_tmp->delete();
    return redirect('admin');
})->name('userDelete');
Route::get('admin/edit/{id}','UserEditController@edit')->name('usereditShow');
Route::post('admin/edit/{id}','UserEditController@update')->name('userpostUpdate');

Route::get('/admin','AdminController@admin');
Route::get('/admin-content','AdminController@content');
Route::get('/admin-user','AdminController@users');

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
