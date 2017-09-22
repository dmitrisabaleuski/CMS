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

Route::get('/admin','AdminController@admin');