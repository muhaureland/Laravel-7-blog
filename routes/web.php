<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::group(['middleware' => 'auth'], function () {

// });
// Route::view('isipost', 'blog.isipost');

Auth::routes();
Route::get('/', 'BlogController@index');


Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::resource('category', 'CategoryController');
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::resource('tag', 'TagController');
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('post/softdelete', 'PostController@softdelete')->name('post.tes');
    Route::get('post/softdelete/{post}', 'PostController@restore')->name('post.restore');
    Route::delete('post/kill/{post}','PostController@kill')->name('post.kill');
    Route::resource('post', 'PostController');
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    Route::get('user/change-password', 'UserController@changePasswordForm')->name('user.password');
    Route::post('user/change-password', 'UserController@changePassword')->name('user.passwordupdate');
    Route::resource('user', 'UserController');
});
Route::get('{slug}', 'BlogController@isiBlog')->name('blog.isi');
Route::get('list/list-post', 'BlogController@listBlog')->name('blog.list');




