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

Route::get('/', function () { return view('home');});

Route::get('/post/', function () { return redirect('/post/1'); });
Route::get('/post/{page}', function () { return view('post');});

Route::get('/gallery', function () { return redirect('/gallery/1'); });
Route::get('/gallery/{page}', function () { return view('gallery');});

Route::get('/news', function () { return redirect('/news/1');});
Route::get('/news/{page}', function () { return view('news');});

Route::get('/signin', function () { return view('signin');});
Route::get('/signup', function () { return view('signup');});
