@extends('app')
@section('title','Blog-Article')
@section('content')
<h3><b>Article</b></h3>
<hr/>


<div class="articles">
    @foreach ($articles as $article)

      <h3>
        <a href="{{ url('/articles', $article->id)}}">{{ $article->title}}</a>
      </h3>
      <div class="body">
        {{ $article->body}}
      </div>

    @endforeach

  </div>
<hr/>
{!! $articles->appends(Request::except('page'))->render() !!}
@stop