@extends('app')

@section('content')
    {!! Form::model($about,['method'=>'PUT',  'route' =>[ 'about.update', $about->id ]]) !!}
    {!! Form::textarea('body') !!}
    {!! Form::submit('Update',['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@stop