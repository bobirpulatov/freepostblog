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

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index');

Route::get('/showpost/{id}', 'HomeController@show_post');
Route::get('/post/', function () { return redirect('/post/1'); });
Route::get('/post/{page}', "HomeController@post");

Route::get('/gallery', function () { return redirect('/gallery/1'); });
Route::get('/gallery/{page}', "HomeController@gallery");

Route::get('/news', function () { return redirect('/news/1');});
Route::get('/news/{page}', "HomeController@news");

Route::get('/view_post', "HomeController@view_news");

Route::post('/signin/check', "HomeController@signin_post");
Route::get('/signin', 'HomeController@signin');

Route::get('/signup', 'HomeController@signup');
Route::post('/register', "HomeController@signup_post");


Route::middleware([\App\Http\Middleware\isSignedIn::class])->prefix('user')->group(function(){
  Route::get('/', 'UserController@index');
  Route::post('/insertpost', 'UserController@insert_post');
  Route::get('/addpost', 'UserController@add_post');
  Route::get('/removepost/{id}', 'UserController@remove_post');
  Route::get('/signout', 'HomeController@signout');

});