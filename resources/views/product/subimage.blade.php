@extends('app')

@section('content')

    @if(Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif
    <h5>add Sub Image</h5>

    @if( 0 < count($subimage))
        {!! Form::open(['method' =>'POST', 'route' => ['product.subimage.destroy'] ]) !!}

        @foreach($subimage as $sub )
            <img src="/images/{{ $sub->name  }}" width="150" height="150"/>
            <input name="subimg[]" type="checkbox" value="{{ $sub->id }}">
        @endforeach
        {!! Form::submit('DELETE', ['class' =>'btn btn-danger']) !!}
        {!! Form::close() !!}
    @endif

    {!! Form::open(['method' => 'POST', 'route' => ['product.subimage.store', $product->id], 'files' => true]) !!}
    {{-- sub image --}}
    <div class="form-group">
        {!! Form::label('sub-image', 'Sub Image:') !!}
        {!! Form::file('subimage[]', ['multiple' => true]) !!}
    </div>
    {{-- End sub Image --}}

    {!! Form::submit('submit',['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}



@stop