@extends('layout.layout')

@section('title', 'Latest news')
@section('headleft')
    <link rel="stylesheet" href="/css/posts.css" type="text/css" />
@endSection

@section('content')
    <div class="main-page-post-container">
        <h2><a href="/post">Latest travel news</a></h2>
        <div class="latest-container">
          <?php
          $url = ($page == 1) ? 'https://skift.com/news' : 'https://skift.com/news/page/'.$page;
          $d = \Sunra\PhpSimple\HtmlDomParser::file_get_html($url);

          $d = $d->find('#archive-stories')[0];

          foreach ($d->children as $children){
            $img = $children->find('.story-thumb-container img');
            $title = $children->find('.story-thumb-container .headline h2 a');

            if ($title == null) continue;

            $title_txt = $title[0]->innertext();
            $title_link = $title[0]->getAttribute('href');
            $img = $img[0]->getAttribute('src');
            ?>
              <div class="each-post">
                  <img src="<?= $img?>" alt="">
                  <a href="/view_post?url=<?= $title_link?>"><?= $title_txt?></a>
              </div>
            <?php
          }
          ?>
        </div>
        <div class="text-center">
            @if($page < 2)
                <a href="{{"/news/".($page+1)}}" class="btn btn-info w-25">Next page >></a>
            @elseif($page > 19)
                <a href="{{"/news/".($page-1)}}" class="btn btn-info w-25"><< Previous page</a>
            @else
                <a href="{{"/news/".($page-1)}}" class="btn btn-info w-25"><< Previous page</a>
                <a href="{{"/news/".($page+1)}}" class="btn btn-info w-25">Next page >></a>
            @endif
        </div>
    </div>
@endSection

