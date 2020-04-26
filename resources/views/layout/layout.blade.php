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
                <li><a href="#">1. News News News News News NewsNews</a></li>
                <li><a href="#">1. News 1</a></li>
                <li><a href="#">1. News 1</a></li>
                <li><a href="#">1. News 1</a></li>
                <li><a href="#">1. News 1</a></li>
            </ul>

            <h3>Latest news</h3>
            <ul>
              <?php
              $url = 'https://skift.com/news';
              $d = \Sunra\PhpSimple\HtmlDomParser::file_get_html($url);

              $d = $d->find('#archive-stories')[0];

              foreach ($d->children as $k => $v){

                if ($k == 5) break;
              $children = $d->children[$k];
              $title = $children->find('.story-thumb-container .headline h2 a');

              if ($title == null) continue;

              $title_txt = $title[0]->innertext();
              $title_link = $title[0]->getAttribute('href');
              ?>
                  <li>{{$k+1}}. <a href="/view_post?url=<?= $title_link?>"><?= $title_txt?></a></li>
            <?php
          }?>
            </ul>
        </div>
    </div>
    <div id="footer">Copyright &copy; {{date('Y')}}. FreePostBlog.com All rights reserved</div>
</div>
</body>
</html>