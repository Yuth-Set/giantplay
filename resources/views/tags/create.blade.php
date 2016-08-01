@extends('app')
@section('title','GPlay')
@section('content')
  <h3><span class="glyphicon glyphicon-pencil"></span> New Tag!</h3><hr/>
  {!! Form::model($tag = new \App\Tag, ['url'=>'tags']) !!}
    @include('tags.form',['submitButtonText' => 'Add Tag'])
  {!! Form::close() !!}

  @include('errors.list')
@stop