@extends('layout.layout')

@section('title', 'Latest gallery')
@section('headleft')
  <link rel="stylesheet" href="/css/posts.css" type="text/css"/>
@endSection

@section('content')
  <script type="text/javascript">
    $(function () {
      $('#exampleModalCenter').on('shown.bs.modal', function (e) {
        let a = $(e.relatedTarget);
        let img = a.parent().find('img').attr('src');

        $(this).find('img').attr('src', img);

      }).on('hidden.bs.modal', function () {
        $(this).find('img').attr('src', '');
      });
    });
  </script>
  <div class="main-page-post-container">
    <h2><a href="/gallery">Latest gallery photos</a></h2>
    <div class="latest-container">
      <?php
      $data = file_get_contents("https://pixabay.com/api/?key=16240491-2e94e49d8e13cc7680ae91a2e&q=travel+tourist&orientation=horizontal&per_page=12&image_type=photo&page=" . $page);
      $data = json_decode($data);
      $hits = $data->hits;
      foreach ($hits as $hit) {
      ?>
      <div class="each-post">
        <img src="{{$hit->webformatURL}}" alt="{{ $hit->user }}">
        <a data-toggle="modal" data-target="#exampleModalCenter" href="#">{{$hit->tags}}</a>
      </div>
      <?php
      }
      ?>
    </div>
    <div class="text-center">
      @if($page < 2)
        <a href="{{"/gallery/".($page+1)}}" class="btn btn-info w-25">Next page >></a>
      @elseif($page > 19)
        <a href="{{"/gallery/".($page-1)}}" class="btn btn-info w-25"><< Previous page</a>
      @else
        <a href="{{"/gallery/".($page-1)}}" class="btn btn-info w-25"><< Previous page</a>
        <a href="{{"/gallery/".($page+1)}}" class="btn btn-info w-25">Next page >></a>
      @endif
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header m-0 p-0">
            <button type="button" class="close p-0" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="text-white">&times;</span>
            </button>
          </div>
          <div class="modal-body m-0 p-0">
            <img class="" style="margin: 0 auto; display: block; width: 100%" src=""/>
          </div>
        </div>
      </div>
    </div>
  </div>
@endSection
