@extends('layouts.master')

@section('content')
    <div id="content">
        <div id="links">
            @foreach(array_chunk($categories->getCollection()->all(), 3) as $row)
                <div class="row">

                    @foreach($row as $product)
                        <div class="col-xs-4">
                            <a href="/images/{{ $product->image }}" data-gallery><img src="/images/{{ $product->image }}" width="300" height="400" class="img-responsive"/></a>
                            <h2><a href="{{route('product.show', $product->id)}}">{{ $product->name }} </a></h2>

                        </div>
                    @endforeach

                </div>
            @endforeach
        </div>
    </div>
    {!! $categories->render() !!}
@stop