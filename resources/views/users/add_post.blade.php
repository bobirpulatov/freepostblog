@extends('layout.admin')

@section('title', 'Add post')
@section('headleft')
    <link rel="stylesheet" href="/css/main-page.css" type="text/css" />
    <script src="https://cdn.tiny.cloud/1/tto23iagtgjpze9oze3ex90ltpael9ftnmot3ckorjtdoimq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
            <div class="form-group col-md-12">
                <textarea name="description" id="description">{{old('description')}}</textarea>
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
    <script>
        tinymce.init({
            menubar: "",
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | image |',
            selector: 'textarea#description',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: 600,
            relative_urls : false,
            remove_script_host : false,
            convert_urls : true,
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