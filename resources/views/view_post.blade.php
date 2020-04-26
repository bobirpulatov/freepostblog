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
            <img src="{{asset('storage/'.$data->img)}}" alt="" style="max-width: 640px; display: block; margin: 0 auto">

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
@endSection

