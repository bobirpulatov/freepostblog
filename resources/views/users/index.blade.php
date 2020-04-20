@extends('layout.layout')

@section('title', 'User personal page')
@section('headleft')
    <link rel="stylesheet" href="/css/main-page.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2>Welcome, {{ explode('|', session('remember'))[0]  }}</h2>
        <button class="btn btn-primary ml-5 mb-3">Add new post</button>
        <h1 class="ml-3 mt-3 mb-3">Your posts</h1>
        <div class="latest-container">
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
                <button class="btn btn-sm btn-danger">Delete</button>
                <button class="btn btn-sm btn-info ml-1">Edit</button>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
                <button class="btn btn-sm btn-danger">Delete</button>
                <button class="btn btn-sm btn-info ml-1">Edit</button>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
                <button class="btn btn-sm btn-danger">Delete</button>
                <button class="btn btn-sm btn-info ml-1">Edit</button>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
                <button class="btn btn-sm btn-danger">Delete</button>
                <button class="btn btn-sm btn-info ml-1">Edit</button>
            </div>
        </div>
    </div>

@endSection