@extends('layout.layout')

@section('title', 'Latest posts')
@section('headleft')
    <link rel="stylesheet" href="/css/posts.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2><a href="/post">Latest posts</a></h2>
        <div class="latest-container">
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-info w-25"><< Previous page</button>
            <button class="btn btn-info w-25">Next page >></button>
        </div>
    </div>
@endSection