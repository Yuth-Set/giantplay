<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/css/all.css">
</head>
<body>

  @include('partials.nav')
  <div class="container">
    @include('flash::message')
    @yield('content')
  </div>
  <script src="/js/all.js"></script>
  @yield('footer')
</body>
</html>