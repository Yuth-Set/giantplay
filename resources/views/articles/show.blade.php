@extends('app')
@section('content')
  <h3>{{ $article->title}}</h3><hr>
  <article>
      <div>
        {{ $article->body}}
      </div>
      <br/>
      <div class="row">
     
            <div class="col-lg-1 col-md-2 col-sm-2 col-xs-6">
              <div class="form-group">
                  {!! link_to_route('articles.edit', 'Update', $article->id, ['class' => 'btn btn-block btn-sm btn-primary']) !!}
              </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-2 col-xs-6">
              <div class="form-group">
                  {!! Form::open(['method'=>'DELETE','route'=>['articles.destroy',$article->id]])!!}
                    {!! Form::submit('Delete',['class' => 'btn btn-block btn-sm btn-danger'])!!}
                  {!! Form::close()!!}       
              </div>
            </div>
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