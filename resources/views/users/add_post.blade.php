@extends('layout.admin')

@section('title', 'Add post')
@section('headleft')
    <link rel="stylesheet" href="/css/main-page.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2>Welcome, {{ explode('|', session('remember'))[2]  }}</h2>
        <h4 class="ml-3 mt-3 mb-3">Adding post:</h4>
        <form class="m-4" method="post" action="/user/insertpost" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-6">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
            </div>
            <div class="form-group col-md-6">
                <label for="image_1">Image # 1:</label>
                <input type="file" class="form-control" id="image_1" name="image_1" value="{{ old('image_1') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="image_2">Image # 2:</label>
                <input type="file" class="form-control" id="image_2" name="image_2" value="{{ old('image_1') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="image_3">Image # 3:</label>
                <input type="file" class="form-control" id="image_3" name="image_3" value="{{ old('image_1') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="image_4">Image # 4:</label>
                <input type="file" class="form-control" id="image_4" name="image_4" value="{{ old('image_1') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="video">Video:</label>
                <input type="file" class="form-control" id="video" name="video" value="{{ old('video') }}">
            </div>
            <div class="form-group col-md-6">
                <label for="description">Description:</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
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