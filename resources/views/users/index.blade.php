@extends('layout.admin')

@section('title', 'User personal page')
@section('headleft')
    <link rel="stylesheet" href="/css/main-page.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2>Welcome, {{ explode('|', session('remember'))[0]  }}</h2>
        <a href="/user/addpost" class="btn btn-primary ml-5 mb-3">Add new post</a>
        <h1 class="ml-3 mt-3 mb-3">Your posts</h1>
        <div class="latest-container">

                <?php

                $user_email = explode('|', session('remember'))[0];
                $user_data = \App\User::where('email', '=', $user_email)->first();

                if ($user_data->id < 1)
                    return redirect('/');

                $posts = \App\Custom\Posts::all()->where('user_id', $user_data->id);

                if (count($posts) > 0){
                    foreach ($posts as $post) {
                ?>
                    <div class="each-post">
                        <img src="{{ asset('/storage/'.$post->img) }}" alt="">
                        <a href="#">{{ $post->title }}</a>
                        <a href="/user/removepost/{{$post->id}}" class="btn btn-sm btn-danger">Delete</a>
                    </div>
                <?php
                    }
                }else echo "<h2 class='text-center'>No post has been found yet.</h2>"
                ?>
        </div>
    </div>

@endSection