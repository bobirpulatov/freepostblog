<?php

$d = \Sunra\PhpSimple\HtmlDomParser::file_get_html($url);
$title = html_entity_decode($d->find('.article-title')[0]->innertext());
$text = $d->find('.post-copy p');
$img = $d->find('.article-photo img');
$img = ($img) ? $img[0]->getAttribute('src') : "";

?>

@extends('layout.layout')

@section('title', $title)

@section('headleft')
    <link rel="stylesheet" href="/css/posts.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2 class="text-white">{{$title}}</h2>
        <div class="latest-container">
            <img src="{{$img}}" alt="" style="max-width: 640px; display: block; margin: 0 auto">
            @foreach( $text as $t)
                <p>{{html_entity_decode($t->text())}}</p>
            @endforeach
        </div>
    </div>
@endSection

