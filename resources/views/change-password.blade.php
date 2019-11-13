@extends('main')

@section('content')

<h1>Change Password</h1>

@include('messages')

<div class="row">
    <div class="col-md-5">
        {!! Form::open(['url'=>'/change-password', 'method'=>'patch']) !!}

        <div class="form-group">
            {{Form::label('current_password')}}
            {{Form::password('current_password', ['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('new_password')}}
            {{Form::password('new_password', ['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('new_password_confirmation')}}
            {{Form::password('new_password_confirmation', ['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <button class="btn btn-primary float-right">
                <i class="fa fa-lock"></i> Change Password
            </button>
        </div>

        {!! Form::close() !!}
    </div>
</div>

@stop
