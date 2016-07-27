@extends('app')
@section('title','GPlay')
@section('content')
  <h3><span class="glyphicon glyphicon-edit"></span> {!! $article->title !!}</h3>
  {!! Form::model($article,['method' => 'PATCH', 'action'=>['ArticlesController@update', $article->id]]) !!}
    @include('articles.form',['submitButtonText' => 'Update Article'])
  {!! Form::close() !!}
  @include('errors.list')
@stop