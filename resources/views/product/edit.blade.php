@extends('app')

@section('content')

    <h1> Edit Product </h1>
    {!! Form::model($product, ['method' => 'PUT', 'route' => ['product.update', $product->id ], 'files' => true]) !!}
    {{--@unless ($product->image)--}}
    {{--<img src="/images/{{ $product->image  }}" class="img-responsive"/>--}}
    {{--@endunless--}}
    <div class="form-group">
        {!! Form::label('code') !!}
        {!! Form::text('code', null, ['class' => 'form-control'] ) !!}
        {!! $errors->first('code', '<span>:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class' => 'form-control'] ) !!}
        {!! $errors->first('name', '<span>:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('price') !!}
        {!! Form::text('price', null, ['class' => 'form-control'] ) !!}
        {!! $errors->first('price', '<span>:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('colour') !!}
        {!! Form::text('colour', null, ['class' => 'form-control'] ) !!}
        {!! $errors->first('colour', '<span>:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('size') !!}
        {!! Form::text('size', null, ['class' => 'form-control'] ) !!}
        {!! $errors->first('size', '<span>:message</span>') !!}
    </div>


    <div class="form-group">
        {!! Form::label('keterangan') !!}
        {!! Form::text('keterangan', null, ['class' => 'form-control'] ) !!}
        {!! $errors->first('keterangan', '<span>:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo', 'Photo:') !!}
        {!! Form::file('image') !!}
        {!! $errors->first('image', '<span>:message</span>') !!}
    </div>


    <div class="form-group">
        {!! Form::label('jenis', 'Jenis:') !!}
        {!! Form::select('tag_lists[]', $tags, null, ['class'=>'form-control', 'multiple']) !!}
    </div>

    {!! Form::hidden('published_at', date('Y-m-d'), ['class' => 'form-control']) !!}

    <div class="form-group">
        {!! Form::submit(isset($buttonText) ? $buttonText : 'Update Product', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

@stop