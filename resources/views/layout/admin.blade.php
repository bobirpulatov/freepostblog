<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" type="text/javascript"></script>
    <title>@yield('title') :: FreePostBlog.com</title>
    @yield('headleft')
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
        <div id="content">
            @yield('content')
        </div>
        <div id="right">
            <h3>Latest post</h3>
            <ul>
                <?php
                $posts = \App\Custom\Posts::all();
                if (count($posts) == 0)
                    echo "<p>Posts not added yet</p>";
                else
                    foreach ($posts as $k => $v) {
                        if ($k > 4) break;
                        echo '<li>'.($k+1).'. <a href="/showpost/'.$posts[$k]->id.'">'.$posts[$k]->title.'</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
    <div id="footer">Copyright &copy; {{date('Y')}}. FreePostBlog.com All rights reserved</div>
</div>
</body>
</html>