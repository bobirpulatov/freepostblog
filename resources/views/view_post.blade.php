<?php

$data = \App\Custom\Posts::where('id', $id)->first();

?>

@extends('layout.layout')

@section('title', $data->title)

@section('headleft')
  <link rel="stylesheet" href="/css/posts.css" type="text/css"/>
@endSection

@section('content')
  <div class="main-page-post-container">
    <h2 class="text-white">{{$data->title}}</h2>
    <div class="">
      <div id="carouselExampleControls" class="carousel slide" data-wrap="false" data-ride="carousel">
        <div class="carousel-inner" style="background: #888;">
          <div class="carousel-item active">
            <div data-toggle="modal" data-target="#m_image_1"
                 style="width: 100%; background: url('{{asset('storage/'.$data->img_1)}}') no-repeat 50% 50%; display: block; height: 400px; background-size: contain"></div>
          </div>
          @if($data->img_2 != null)
            <div class="carousel-item">
              <div data-toggle="modal" data-target="#m_image_2"
                   style="width: 100%; background: url('{{asset('storage/'.$data->img_2)}}') no-repeat 50% 50%; display: block; height: 400px; background-size: contain"></div>
            </div>
          @endif
          @if($data->img_3 != null)
            <div class="carousel-item">
              <div data-toggle="modal" data-target="#m_image_3"
                   style="width: 100%; background: url('{{asset('storage/'.$data->img_3)}}') no-repeat 50% 50%; display: block; height: 400px; background-size: contain"></div>
            </div>
          @endif
          @if($data->img_4 != null)
            <div class="carousel-item">
              <div data-toggle="modal" data-target="#m_image_4"
                   style="width: 100%; background: url('{{asset('storage/'.$data->img_4)}}') no-repeat 50% 50%; display: block; height: 400px; background-size: contain"></div>
            </div>
          @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="ml-5 mt-4 pl-3">
        <h5><b>Description:</b></h5>
        <?php
        $d = explode("\n", $data->description);
        foreach ($d as $item) {
          $item = str_replace("\n", '<br />', $item);
          echo "<p>" . $item . "</p>";
        }
        ?>
      </div>

      @if($data->video != null)
        <div class="p-4">
          <h5><b>Video:</b></h5>
          <div>
            <video width="100%" height="350" controls>
              <source src="{{asset('storage/'.$data->video)}}">
              Your browser does not support the video tag.
            </video>
          </div>
        </div>
      @endif
    </div>
  </div>

  <div class="modal fade" id="m_image_1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header m-0 p-0">
          <button type="button" class="close p-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body m-0 p-0">
          <img class="" style="margin: 0 auto; display: block; width: 100%" src="{{asset('storage/'.$data->img_1)}}"
               alt="">
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="m_image_2" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header m-0 p-0">
          <button type="button" class="close p-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body m-0 p-0">
          <img class="" style="margin: 0 auto; display: block; width: 100%" src="{{asset('storage/'.$data->img_2)}}"
               alt="">
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="m_image_3" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header m-0 p-0">
          <button type="button" class="close p-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body m-0 p-0">
          <img class="" style="margin: 0 auto; display: block; width: 100%" src="{{asset('storage/'.$data->img_3)}}"
               alt="">
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="m_image_4" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header m-0 p-0">
          <button type="button" class="close p-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
          </button>
        </div>
        <div class="modal-body m-0 p-0">
          <img class="" style="margin: 0 auto; display: block; width: 100%" src="{{asset('storage/'.$data->img_4)}}"
               alt="">
        </div>
      </div>
    </div>
  </div>

@endSection

