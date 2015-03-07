@extends('app')

@section('content')

<h1> Create Article </h1>
{!! Form::open(['method' => 'post', 'route' => 'article.store' ] ) !!}

	@include('article/_form')
{!! Form::close() !!}

@stop