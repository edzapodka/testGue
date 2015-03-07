@extends('app')

@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif

    <h5>Gallery</h5>

    {!! Form::open(['method' => 'GET']) !!}
    <div class="input-group">

        {!! Form::input('search', 'q', null,['class' => 'form-control', 'placeholder' => 'Search...']) !!}
                  <span class="input-group-btn">
                   {!! Form::submit('Go', ['class' =>'btn btn-default']) !!}
                  </span>

    </div>
    {!! Form::close() !!}

    @if( 0 < count($galleries))
        {!! Form::open(['method' =>'post', 'route' => ['gallery.destroy'] ]) !!}

        @foreach($galleries as $sub )
            <img src="/images/gallery/{{ $sub->name  }}" width="150" height="150"/>
            <input name="subimg[]" type="checkbox" value="{{ $sub->id }}">
        @endforeach
        {!! Form::submit('DELETE', ['class' =>'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif



    {!! Form::open(['method' => 'POST', 'route' => ['gallery.store'], 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('sub-image', 'Sub Image:') !!}
        {!! Form::file('subimage[]', ['multiple' => true]) !!}
    </div>


    {!! Form::submit('submit',['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}



@stop