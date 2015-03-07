@extends('app')

@section('content')

@foreach($articles as $article)
	<h1> <a href="{{ route('article.show', $article->seo_title) }}">{{$article->title}}</a></h1>

	<p>{!! $article->body !!}</p>

	<p>{{ $article->published_at }}</p>
	<hr>
@endforeach

	{!! $articles->render() !!}

@stop