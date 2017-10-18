@extends('app')

@section('content')
    <h1>Write a new Article</h1>
    <hr/>
    {!! Form::open(['url'=>'articles']) !!} {{--post запрос--}}
    @include('articles._form',['submitButtonName'=>'Add article'])
    {!! Form::close() !!}

   @include('errors.list')
@stop