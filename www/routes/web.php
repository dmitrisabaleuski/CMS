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
Route::get('/admin-archives','AdminController@viewArchives');
Route::get('/admin-menu','AdminController@viewMenu');


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
Route::post('/addPage','PageController@savePage')->name('savePage');
Route::get('/editPage/{id}','PageController@editPage')->name('editPage');
Route::post('/editPage/{id}', 'PageController@updatePage')->name('pageUpdate');
Route::delete('admin-pages/delete/{page}',function($page){
    $page_tmp = App\Model\Page::where('id',$page)->first();
    $page_tmp->delete();
    $menu = App\Model\Menu::where('active_id',$page)->first();
    $menu->delete();
    return redirect('admin-pages');
})->name('pageDelete');
Route::get('{pageUrl}','PageController@pageShow')->name('pageShow');

/***** MULTIMEDIA *****/
Route::get('admin-multimedia/delete/{imageId}','MultimediaController@deleteMultimedia')->name('deleteMultimedia');
Route::get('admin/multimediadelete/{imageId}-{id}','MultimediaController@deleteMultimediaInAccaunt')->name('deleteMultimediaInAccaunt');

/***** FILES *****/
Route::post('addFile','FileController@addNewFile')->name('addFile');
Route::get('/admin-files/delete/{fileid}','FileController@deleteFile')->name('deleteFile');
Route::get('admin/filedelete/{fileid}-{id}','FileController@deleteFileInAccaunt')->name('deleteFileInAccaunt');

/***** ARCHIVES *****/
Route::get('admin-archives/delete/{archiveId}','ArchiveController@deleteArchive')->name('deleteArchive');
Route::get('admin/archivedelete/{archiveId}-{id}','ArchiveController@deleteArchiveInAccaunt')->name('deleteArchiveInAccaunt');

/***** USERS AUTHORIZATION *****/
Auth::routes();
// Маршруты аутентификации...
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

// Маршруты регистрации...
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register', 'Auth\RegisterController@register');

/***** MENU *****/
Route::get('menu/status-{id}', 'MenuController@changeStatus')->name('changeStatus');
Route::get('menu/name-{id}', 'MenuController@changeName')->name('changeName');
Route::post('menu/name-{id}', 'MenuController@updateName')->name('menuUpdate');
Route::get('menu/delete-{id}',function($menuId){
    $menu = App\Model\Menu::where('id',$menuId)->first();
    $menuId = $menu->active_id;
    $pageActive = App\Model\Page::find($menuId);
    $pageActive->fill([
        'active_menu'=>'0',
    ]);
    $menu->delete();
    $pageActive->update();
    return redirect('admin-menu');
})->name('deleteMenu');