@extends('app')
@section('title','Blog-Article')
@section('content')
<h3><span class="glyphicon glyphicon-book"></span> Article</h3>
<hr/>


<div class="articles">
    @foreach ($articles as $article)

      <h3>
        <a href="{{ url('/articles', $article->id)}}"><span class="glyphicon glyphicon-chevron-right"></span> {{ $article->title}}</a>
      </h3>
      <div class="body">
        {{ $article->body}}
      </div><hr/>

    @endforeach

  </div>

{!! $articles->appends(Request::except('page'))->render() !!}
@stop

