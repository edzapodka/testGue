@extends('app')

@section('content')


<h1>{{ $article->title }}</h1>
<p>{{ $article->body }}</p>

<a href="{{ route('article.index') }}">go back</a>
    <a href="{{ route('article.edit', $article->id) }}"><button class="btn btn-primary">edit</button> </a>
@stop