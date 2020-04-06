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
            <li><a href="/signin">Sign in</a> / <a href="/signup">Sign up</a></li>
        </ul>
    </div>
    <div id="center">
        <div id="signin">
            <h3 class="text-center mb-2">Registration</h3>
            <form>
                <div class="form-group mb-2">
                    <label for="name" class="small m-0 ml-1">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Your name">
                </div>
                <div class="form-group mb-2">
                    <label for="email" class="small m-0 ml-1">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Your email">
                </div>
                <div class="form-group mb-2">
                    <label for="password" class="small m-0 ml-1">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Your password">
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="small m-0 ml-1">Retype Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Retype your password">
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