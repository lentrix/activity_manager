@extends('main')

@section('content')

<div class="row">
    <div class="col-lg-6 offset-lg-3" style="margin-top: 20px;">

        @include('messages')
        <div class="card text-gray bg-light">
            <div class="card-header">
                <h1>User Login</h1>
            </div>
            <div class="card-body">

                {!! Form::open(['url'=>'/login', 'method'=>'post']) !!}

                <div class="form-group">
                    {!! Form::label("username", "Username") !!}
                    {!! Form::text("username", null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label("password", "Password") !!}
                    {!! Form::password("password", ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-lg float-right">
                        <i class="glyphicon glyphicon-ok-sign"></i> Login
                    </button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop
