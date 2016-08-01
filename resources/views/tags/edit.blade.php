@extends('app')
@section('title','GPlay')
@section('content')
  <h3><span class="glyphicon glyphicon-edit"></span> {!! $tag->name !!}</h3>
  {!! Form::model($tag,['method' => 'PATCH', 'action'=>['TagsController@update', $tag->id]]) !!}
    @include('tags.form',['submitButtonText' => 'Update Tag'])
  {!! Form::close() !!}
  @include('errors.list')
@stop