<?php
$user_email = explode('|', session('remember'))[0];
$user_data = \App\User::where('email', '=', $user_email)->first();

$post_data = \App\Custom\Posts::where([ ['user_id', $user_data->id], ['id', $post_id] ])->first();

?>

@extends('layout.admin')

@section('title', 'Add post')
@section('headleft')
  <link rel="stylesheet" href="/css/main-page.css" type="text/css"/>
@endSection

@section('content')
  <div class="main-page-post-container">
    <h2>Welcome, {{ explode('|', session('remember'))[0]  }}</h2>
    <h4 class="ml-3 mt-3 mb-3">Editing post:</h4>
    <form class="m-4" method="post" action="/user/editPostAction" enctype="multipart/form-data">
      @csrf
      <div class="form-group col-md-6">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post_data->title }}">
        <input type="hidden" name="post_id" value="{{ $post_id }}">
      </div>
      <div class="form-group col-md-6">
        <label for="image">Image:</label>
        <input type="file" class="form-control" id="image" name="image" />
      </div>
      <div class="form-group col-md-6">
        <label for="description">Description:</label>
        <textarea class="form-control" name="description" id="description" cols="30"
                  rows="10">{{ $post_data->description }}</textarea>
      </div>
      <div class="form-group col-md-6">
        <button class="btn btn-block btn-primary">Add post</button>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </form>
  </div>

@endSection