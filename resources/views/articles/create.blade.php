@extends('app')
@section('title','GPlay')
@section('content')
  <h3><span class="glyphicon glyphicon-pencil"></span> Enjoy new thing!</h3><hr/>
  {!! Form::model($article = new \App\Article, ['url'=>'articles']) !!}
    @include('articles.form',['submitButtonText' => 'Add Article'])
  {!! Form::close() !!}

  @include('errors.list')
@stop

