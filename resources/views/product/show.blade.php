@extends('layouts.master')

@section('content')

    <div id="content" class="row">
        <div class="col-xs-6">
            <img src="/images/{{ $product->image }}" class="img-responsive img-rounded"/>
        </div>



        <div class="product-detail col-xs-4">
            <h2>Product Detail</h2>
            <table class="table table-responsive">
                <tr>
                    <td>CODE </td>
                    <td>: {{ $product->code }}</td>
                </tr>
                <tr>
                    <td>NAME :</td>
                    <td>: {{ $product->name }}</td>
                </tr>
                <tr>
                    <td>PRICE</td>
                    <td>: {{ $product->price }}</td>
                </tr>
                <tr>
                    <td>SIZE</td>
                    <td>: {{ $product->size }}</td>
                </tr>
                <tr>
                    <td>Colour </td>
                    <td>: {{ $product->colour }}</td>
                </tr>
                <tr>
                    <td>KETERANGAN </td>
                    <td>: {{ $product->keterangan }}</td>
                </tr>
                <tr>
                    <td><h5>Jenis</h5></td>
                    @foreach($product->jenis as $tag)
                        <td><span class="glyphicon glyphicon-tag badge"> {{ $tag->name }}</span> </td>
                    @endforeach
                </tr>
            </table>

        </div>
    </div>

    <div class="row">
        @foreach($subimage as $sub)
        <div class="image-product col-xs-2">
            <img src="/images/{{ $sub->name }}" class="img-responsive img-rounded"/>
        </div>
        @endforeach
    </div>




@stop