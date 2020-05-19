<?php

$data = \App\Custom\Posts::where('id', $id)->first();

?>

@extends('layout.layout')

@section('title', $data->title)

@section('headleft')
    <link rel="stylesheet" href="/css/posts.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2 class="text-white">{{$data->title}}</h2>
        <div class="">
            <img data-toggle="modal" data-target="#exampleModalCenter" src="{{asset('storage/'.$data->img)}}" alt="" style="max-width: 640px; display: block; margin: 0 auto">

            <div class="ml-5 mt-2 pl-3">
            <?php
            $d = explode("\n", $data->description);
            foreach ($d as $item) {
                echo "<p>".$item."</p>";
            }
            ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header m-0 p-0">
                    <button type="button" class="close p-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body m-0 p-0">
                    <img class="" style="margin: 0 auto; display: block; width: 100%" src="{{asset('storage/'.$data->img)}}" alt="">
                </div>
            </div>
        </div>
    </div>

@endSection

