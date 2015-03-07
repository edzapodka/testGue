@extends('app')

@section('content')

<h1> Edit Article </h1>
{!! Form::model($article, ['method' => 'PUT', 'route' => ['article.update', $article->id ]]) !!}

	@include('article/_form', ['buttonText' => 'Update User'])
{!! Form::close() !!}

@stop