<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/bootstrap.css.map">
  <link rel="stylesheet" href="/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/bootstrap-theme.css">
  <link rel="stylesheet" href="/css/bootstrap-theme.css.map">
  <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="/css/bootstrap-theme.min.css.map">
  <link rel="stylesheet" href="/css/select2.min.css">


  <style type="text/css">
    * {
      border-radius:1px !important;
    }
    .fb-wrap {
      width:100%;
      margin: 0 auto;
    }

    .fb-like-box, .fb-like-box span, .fb-like-box span iframe[style] { width: 100% !important; }
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px; height: 0; overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
  </style>
</head>
<body>
  @if(Auth::user())
  @include('partials.authNav')
  @else
  @include('partials.nav')
  @endif

  <div class="container">
    @include('flash::message')
    @yield('content')
    <div class="row" >
      <div class="col-md-8" >
        @yield('content-left')
      </div>
      <div class="col-md-4">
        @yield('content-right')
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @yield('pagins')
      </div>
    </div>
  </div>
  <script src="/js/libs/jquery-2.1.4.min.js"></script>
  <script src="/js/libs/bootstrap.js"></script>
  <script src="/js/libs/bootstrap.min.js"></script>
  <script src="/js/libs/select2.min.js"></script>
  <script src="/js/msgDisplay.js"></script>
  <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js" type="text/javascript"></script>


  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
  <script src="/js/articles.js"></script>
  <div class="container">
  @yield('footer')
  </div>
</body>
</html>