<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="">
</head>
<body>
  <h1>{{ $post->title}}</h1>

  @can('update',$post)
    <a href="#">Update This post</a>
  @endcan
  @section('footer')
  Yuth-2016
  @endsection
</body>
</html>