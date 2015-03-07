@extends('layouts.master')

@section('content')
    <div id="content">
        <div id="links">
            @foreach(array_chunk($galleries->getCollection()->all(), 4) as $row)
                <div class="row">

                    @foreach($row as $gallery)
                        <div class="col-xs-3">
                            <a href="/images/gallery/{{ $gallery->name }}" data-gallery><img src="/images/gallery/{{ $gallery->name }}" width="180" height="140"/></a>


                        </div>
                    @endforeach

                </div>
            @endforeach
        </div>
    </div>
    <div class="row pull-right">
    {!! $galleries->render() !!}
    </div>
@stop

{{--ukuran galery 180 x 140
row 4 k 2
col-md-3
tanpa judul
--}}