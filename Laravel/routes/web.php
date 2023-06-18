<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
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
// ↑不要なため削除

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('index','PostsController@index');

Route::get('/post/{id}/update-form','PostsController@updateForm');

Route::post('/post/update', 'PostsController@update');

Route::get('create-form','PostsController@createForm');

Route::post('post/create','PostsController@create');

Route::get('/post/{id}/delete','PostsController@delete');

Route::get('/board', [UserController::class, 'index']);

Route::get('/search/{search?}','ProfileController@search')->name('search');

Route::get('/profile/{user_id}','ProfileController@profile')->name('profile');

Route::get('/follower-list/{user_id}','ProfileController@follower');

Route::get('/follow-list/{user_id}','ProfileController@follow');

Route::get('/profile/edit-form/{id}','ProfileController@editForm');

Route::post('/profile/edit','ProfileController@edit');

//フォロー
Route::get('/follow/{id}/following','FollowController@Follow');
//フォロー解除
Route::get('/follow/{id}/unfollowing','FollowController@unFollow');
