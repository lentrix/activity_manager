@extends('main')

@section('content')

<h1>Create Activity</h1>

<ul class="breadcrumb">
    <li><a href="{{url('/home')}}">Home</a></li>
    <li><a href="{{url('/activities')}}">Activities</a></li>
    <li class="active">Create Activity</li>
</ul>

<div class="row">
    <div class="col-lg-6">
        {!! Form::open(['url'=>'/activities', 'method'=>'post']) !!}

        @include('activities._fields')

        <div class="form-group">
            <button class="btn btn-primary pull-right" type="submit">
                <i class="glyphicon glyphicon-ok"></i>
                Create Activity
            </button>
        </div>

        {!! Form::close() !!}
    </div>
</div>
@stop
