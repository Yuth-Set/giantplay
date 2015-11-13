@extends('app')
@section('content')
  <h3>{{ $article->title}}</h3>
  <article>
    
      {{ $article->body}}
      <br/>
      <div>
        <button>Update</button>&nbsp;<button>Delete</button>
      </div>
  </article>
  @unless($article->tags->isEmpty())
  <hr/>
  <h5><small>Tags:</small></h5>
  <ul>
  <small>
    @foreach($article->tags as $tag)
      <li>{{ $tag->name }}</li>
    @endforeach
  </small>

  </ul>
  @endunless
@stop