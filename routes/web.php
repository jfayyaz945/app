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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('posts','PostController');
Route::get('permissions/get_by_module', 'PermissionController@get_by_module')->name('permissions.get_by_module');
Route::post('permissions/save_permissions', 'PermissionController@save_permissions')->name('permissions.save_permissions');

Route::resource('roles','RoleController');
Route::resource('permissions','PermissionController');
Route::resource('users','UserController');
Route::resource('regions','RegionController');
Route::resource('areas','AreaController');
Route::resource('branches','BranchController');

Route::get('/posts', 'PostController@index')->name('list_posts');
Route::group(['prefix' => 'posts'], function () {
    Route::get('/drafts', 'PostController@drafts')
        ->name('list_drafts')
        ->middleware('auth');

    Route::get('/show/{id}', 'PostController@show')
        ->name('show_post');

    Route::get('/create', 'PostController@create')
        ->name('create_post')
        ->middleware('can:create-post');

    Route::post('/create', 'PostController@store')
        ->name('store_post')
        ->middleware('can:create-post');

    Route::get('/edit/{post}', 'PostController@edit')
        ->name('edit_post')
        ->middleware('can:update-post,post');

    Route::post('/edit/{post}', 'PostController@update')
        ->name('update_post')
        ->middleware('can:update-post,post');

    // using get to simplify
    Route::get('/publish/{post}', 'PostController@publish')
        ->name('publish_post')
        ->middleware('can:publish-post');
});
