@extends('layouts.master')

@section('content')
<div id="content">
    <div id="links">
    @foreach(array_chunk($products->getCollection()->all(), 3) as $row)
        <div class="row">

            @foreach($row as $product)
                <div class="col-xs-4">
                    <a href="/images/{{ $product->image }}" data-gallery><img src="/images/{{ $product->image }}" width="240" height="140"/></a>
                    <h5 style="text-align: center"><a href="{{route('product.show', $product->id)}}">{{ $product->name }} </a></h5>
                    
                </div>
            @endforeach

        </div>
    @endforeach
    </div>
    <div class="row pull-right">
        {!! $products->render() !!}
    </div>
</div>


@stop

{{--ukuran galery 180 x 140
row 4 k 2
col-xs-3
tanpa judul
--}}