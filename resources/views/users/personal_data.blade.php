@extends('layout.admin')
<?php
$user_data = explode('|', session('remember'));
?>
@section('title', 'Add post')
@section('headleft')
    <link rel="stylesheet" href="/css/main-page.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2>Welcome, {{ $user_data[2]  }}</h2>
        <h4 class="ml-3 mt-5 mb-3">Editing personal data:</h4>
        <form class="m-4 mb-5" method="post" action="/user/personal_data_edit">
            @csrf
            <div class="form-group col-md-6">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$user_data[2]}}">
                @if($errors->has('name'))
                    <small class="text-danger font-weight-bold ml-1">{{$errors->first('name')}}</small>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user_data[0]}}">
                @if($errors->has('email'))
                    <small class="text-danger font-weight-bold ml-1">{{$errors->first('email')}}</small>
                @endif
            </div>
            <div class="form-group col-md-6">
                <button class="btn btn-block btn-primary">Edit data</button>
            </div>
        </form>

        <hr>
        <h4 class="ml-3 mt-5 mb-3">Renewing password:</h4>
        <form class="m-4" method="post" action="/user/personal_data_password">
            @csrf
            <div class="form-group col-md-6">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                @if($errors->has('password'))
                    <small class="text-danger font-weight-bold ml-1">{{$errors->first('password')}}</small>
                @endif
            </div>
            <div class="form-group col-md-6">
                <label for="repassword">Retype password:</label>
                <input type="password" class="form-control" id="repassword" name="repassword">
                @if($errors->has('repassword'))
                    <small class="text-danger font-weight-bold ml-1">{{$errors->first('repassword')}}</small>
                @endif
            </div>
            <div class="form-group col-md-6">
                <button class="btn btn-block btn-primary">Edit password</button>
            </div>
        </form>
    </div>

@endSection