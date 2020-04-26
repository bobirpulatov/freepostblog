@extends('layout.admin')

@section('title', 'Add post')
@section('headleft')
    <link rel="stylesheet" href="/css/main-page.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2>Welcome, {{ explode('|', session('remember'))[0]  }}</h2>
        <h4 class="ml-3 mt-3 mb-3">Adding post:</h4>
        <form class="m-4" method="post" action="/user/insertpost" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-6">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group col-md-6">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
            </div>
            <div class="form-group col-md-6">
                <button class="btn btn-block btn-primary">Add post</button>
            </div>
        </form>
    </div>

@endSection