@extends('layout.layout')

@section('title', 'Latest gallery')
@section('headleft')
    <link rel="stylesheet" href="/css/posts.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2><a href="/gallery">Latest gallery photos</a></h2>
        <div class="latest-container">
          <?php
          $data = file_get_contents("https://pixabay.com/api/?key=16240491-2e94e49d8e13cc7680ae91a2e&q=travel+tourist&orientation=horizontal&per_page=12&image_type=photo&page=".$page);
          $data = json_decode($data);
          $hits = $data->hits;
          foreach ($hits as $hit) {
          ?>
              <div class="each-post">
                  <img src="{{$hit->webformatURL}}" alt="{{ $hit->user }}">
                  <a href="#">{{$hit->tags}}</a>
              </div>
          <?php
          }
          ?>
        </div>
        <div class="text-center">
            @if($page < 2)
                <a href="{{"/gallery/".($page+1)}}" class="btn btn-info w-25">Next page >></a>
            @elseif($page > 19)
                <a href="{{"/gallery/".($page-1)}}" class="btn btn-info w-25"><< Previous page</a>
            @else
                <a href="{{"/gallery/".($page-1)}}" class="btn btn-info w-25"><< Previous page</a>
                <a href="{{"/gallery/".($page+1)}}" class="btn btn-info w-25">Next page >></a>
            @endif
        </div>
    </div>
@endSection
