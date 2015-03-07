@extends('app')

@section('content')
    <h2>List Produk</h2>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('product.create') }}"><button class="btn btn-primary">create produk</button></a>
        </div>
        <div class="col-md-6">
        {!! Form::open(['method' => 'GET']) !!}
        <div class="input-group">

                {!! Form::input('search', 'q', null,['class' => 'form-control', 'placeholder' => 'Search...']) !!}
                  <span class="input-group-btn">
                   {!! Form::submit('Go', ['class' =>'btn btn-default']) !!}
                  </span>

        </div>
        {!! Form::close() !!}
        </div>
    </div>

    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Code</th>
            <th>Nama Produk</th>
            <th>Price</th>
            <th>Size</th>
            <th>Colour</th>
            <th>Keterangan</th>
            <th>Action</th>
        </tr>
        </thead>
        @if($products->count())
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td><a href="{{ route('product.edit', $product->id) }}">{{ $product->code }} </a></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->size }}</td>
                    <td>{{ $product->colour }}</td>
                    <td>{{ $product->keterangan }}</td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}"><button class="btn btn-primary">EDIT</button></a>
                        <a href="{{ route('product.subimage', $product->id) }}"><button class="btn btn-success">Add image</button></a>
                        {!! Form::open(['method' =>'delete', 'route' => ['product.destroy', $product->id] ]) !!}

                        {!! Form::submit('DELETE', ['class' =>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>
    {!! $products->render() !!}

    @else
        no product
    @endif


@stop