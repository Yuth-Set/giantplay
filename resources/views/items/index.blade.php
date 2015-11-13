<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Item</title>
  <link rel="stylesheet" href="/css/all.css">
</head>
<body>
<div class="container">
  

  @foreach(array_chunk($items->getCollection()->all(),3) as $row )
    <div class="row">
      @foreach ($row as $item)
        {{-- expr --}}
        <article class="col-md-4">
            <h2>{{ $item->title}}</h2>
            <img src="{{ $item->image}}" alt="{{ $item->title}}">
            <div class="body">
              {{ $item->description }}
            </div>
        </article>
      @endforeach  
    </div>
  @endforeach
  {!! $items->appends(Request::except('page'))->render() !!}
</div>
</body>
</html>