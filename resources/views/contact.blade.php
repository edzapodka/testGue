@extends('layouts.master')

@section('content')
    <div id="content">
        @if(Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif
        <div class="row">
            <h3>CONTACT</h3>
        <div class="col-xs-8">


        {!! Form::open(['method' => 'POST', 'route' => 'mail.store']) !!}
       <table class="table table-borderless">

            <tbody>

            <tr>
                <td>Addres 1</td>
                <td>1820 Hypoxulo Road Suite C9 Lake Worth, FL 33462</td>
            </tr>
            <tr>
                <td>Phone 1</td>
                <td>#321.921.9819</td>
            </tr>
            <tr>
                <td>Addres 2</td>
                <td>Tokyo Office, 2Fl MOM BLD 3-21, Kanda Sakumacho
                    Chiyoda-ku, Tokyo
                    101-0025 Japan</td>
            </tr>
            <tr>
                <td>Phone 2</td>
                <td>+81-3-3866-7795</td>

            </tr>

            <tr>
                <td>Email</td>
                <td>info@gambinojeans.com</td>
            </tr>
                <tr>
                    <div class="form-group">
                        <td>{!! Form::label('nama', 'Name') !!}</td>
                        <td>{!! Form::text('name',null,['class' => 'form-control'] ) !!}</td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>{!! Form::label('addresss', 'Address') !!}</td>
                        <td>{!! Form::text('address',null,['class' => 'form-control'] ) !!}</td>
                    </div>
                </tr>
                <tr>
                    <div class="form-group">
                        <td>{!! Form::label('phones', 'Phone') !!}</td>
                        <td>{!! Form::text('phone',null,['class' => 'form-control'] ) !!}</td>
                    </div>
                </tr>
                    <div class="form-group">
                        <td>{!! Form::label('emails', 'E-mail') !!}</td>
                        <td>{!! Form::text('email',null,['class' => 'form-control'] ) !!}</td>
                    </div>
                <tr>
                    <div class="form-group">
                        <td>{!! Form::label('comments', 'Comment') !!}</td>
                        <td>{!! Form::textarea('comment',null,['class' => 'form-control'] ) !!}</td>
                    </div>
                </tr>
            </tbody>
        </table>





        {!! Form::submit('Submit',['class' => 'btn btn-default pull-right']) !!}
        {!! Form::close() !!}
        </div>
        </div>
    </div>
@stop