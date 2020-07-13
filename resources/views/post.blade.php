@extends('layout.layout')

@section('title', 'Latest posts')
@section('headleft')
    <link rel="stylesheet" href="/css/posts.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2><a href="/post">Latest posts</a></h2>
        <div class="latest-container">
            <?php
            $posts = \App\Custom\Posts::all();
            if (count($posts) == 0)
            echo "<p>Posts not added yet</p>";
            else
            foreach ($posts as $k => $v) {
            if ($k > 3) break;
            ?>
            <div class="each-post">
                <a href="{{ '/showpost/'.$posts[$k]->id }}">{{ $posts[$k]->title }}</a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
@endSection