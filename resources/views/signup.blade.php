<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/signinup.css">
    <script src="/js/app.js" type="text/javascript"></script>
    <title>Registration :: FreePostBlog.com</title>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <a id="logo" href="#"></a>
        <ul>
            <li><a href="/">Home page</a></li>
            <li><a href="/post">Latest post</a></li>
            <li><a href="/gallery">Gallery</a></li>
            <li><a href="/news">Latest news</a></li>
            @if(! session('remember'))
                <li><a href="/signin">Sign in</a> / <a href="/signup">Sign up</a></li>
            @else
                <li><a href="/user">{{ explode('|', session('remember'))[0]  }}</a> / <a href="/user/signout">Sign out</a></li>
            @endif
        </ul>
    </div>
    <div id="center">
        <div id="signin">
            <h3 class="text-center mb-2">Registration</h3>
            <form action="/register" method="post">
                {{@csrf_field()}}

                <div class="form-group mb-2">
                    <label for="name" class="small m-0 ml-1">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Your name">
                    @if($errors->has('name'))
                        <small class="text-danger font-weight-bold ml-1">{{$errors->first('name')}}</small>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label for="email" class="small m-0 ml-1">Email:</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Your email">
                    @if($errors->has('email'))
                        <small class="text-danger font-weight-bold ml-1">{{$errors->first('email')}}</small>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="small m-0 ml-1">Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Your password">
                    @if($errors->has('password'))
                        <small class="text-danger font-weight-bold ml-1">{{$errors->first('password')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-info btn-block">Sign up</button>
                </div>
            </form>
        </div>
    </div>
    <div id="footer">Copyright &copy; {{date('Y')}}. FreePostBlog.com All rights reserved</div>
</div>
</body>
</html>