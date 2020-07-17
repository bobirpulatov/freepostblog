<?php
$user_email = explode('|', session('remember'))[0];
$user_data = \App\User::where('email', '=', $user_email)->first();

$post_data = \App\Custom\Posts::where([ ['user_id', $user_data->id], ['id', $post_id] ])->first();

?>

@extends('layout.admin')

@section('title', 'Add post')
@section('headleft')
  <link rel="stylesheet" href="/css/main-page.css" type="text/css"/>
  <script src="https://cdn.tiny.cloud/1/tto23iagtgjpze9oze3ex90ltpael9ftnmot3ckorjtdoimq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endSection

@section('content')
  <div class="main-page-post-container">
    <h2>Welcome, {{ explode('|', session('remember'))[2]  }}</h2>
    <h4 class="ml-3 mt-3 mb-3">Editing post:</h4>
    <form class="m-4" method="post" action="/user/editPostAction" enctype="multipart/form-data">
      @csrf
      <div class="form-group col-md-12">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ $post_data->title }}">
        <input type="hidden" name="post_id" value="{{ $post_id }}">
      </div>
      <div class="form-group col-md-12">
        <textarea name="description" id="description">{{ $post_data->description }}</textarea>
      </div>
      <div class="form-group col-md-6">
        <button class="btn btn-block btn-primary">Edit post</button>
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
  <script>
    tinymce.init({
      menubar: "",
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | image |',
      selector: 'textarea#description',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
      height: 600,
      style_formats: [
        {
          title: 'Image Left',
          selector: 'img',
          styles: {
            'float': 'left',
            'margin': '0 10px 0 10px'
          }
        },
        {
          title: 'Image Right',
          selector: 'img',
          styles: {
            'float': 'right',
            'margin': '0 0 10px 10px'
          }
        }
      ],
      images_upload_handler: function (blobInfo, success, failure) {
        var xhr, formData;
        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '{{ route('uploadImage') }}');
        var token = '{{ csrf_token() }}';
        xhr.setRequestHeader("X-CSRF-Token", token);
        xhr.onload = function() {
          var json;
          if (xhr.status != 200) {
            failure('HTTP Error: ' + xhr.status);
            return;
          }
          json = JSON.parse(xhr.responseText);

          if (!json || typeof json.location != 'string') {
            failure('Invalid JSON: ' + xhr.responseText);
            return;
          }
          success(json.location);
        };
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
      }
    });
  </script>
@endSection