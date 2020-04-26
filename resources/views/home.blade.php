@extends('layout.layout')

@section('title', 'Main page')
@section('headleft')
    <link rel="stylesheet" href="/css/main-page.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2><a href="/post">Latest posts</a></h2>
        <div class="latest-container">
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
        </div>
        <div class="latest-container">
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title  dasname</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
            <div class="each-post">
                <img src="https://www.imgonline.com.ua/examples/random-pixels-wallpaper-big.jpg" alt="">
                <a href="#">Title name</a>
            </div>
        </div>
    </div>

    <div class="main-page-post-container">
        <h2><a href="/news">Latest travel news</a></h2>
      <?php
      $url = 'https://skift.com/news';
      $d = \Sunra\PhpSimple\HtmlDomParser::file_get_html($url);

      $d = $d->find('#archive-stories')[0];

      foreach ($d->children as $k => $v){
        if ($k >= 8) break;
      $children = $d->children[$k];
      $img = $children->find('.story-thumb-container img');
      $title = $children->find('.story-thumb-container .headline h2 a');

      if ($title == null) continue;

      $title_txt = $title[0]->innertext();
      $title_link = $title[0]->getAttribute('href');
      $img = $img[0]->getAttribute('src');
      if ($k == 0) echo '<div class="latest-container">';
      ?>
        <div class="each-post">
            <img class="" src="<?= $img?>" alt="">
            <a href="/view_post?url=<?= $title_link?>"><?= $title_txt?></a>
        </div>
      <?php
      if (($k+1)%4 == 0 && $k > 2) echo '</div><div class="latest-container">';
      }
      echo "</div>";
      ?>
    </div>
@endSection