@extends('main')

@section('content')

<h1>Create Semester</h1>

<ul class="breadcrumb">
    <li><a href="{{url('/')}}">Home</a></li>
    <li><a href="{{url('/semesters')}}">Semesters</a></li>
    <li class="active">Create Semester</li>
</ul>

<div class="row">
    <div class="col-md-6">

        @include('messages')

        {{Form::open(['url'=>'/semesters','method'=>'post'])}}

        @include('semesters._fields')

        <div class="form-group">
             <button class="btn btn-primary pull-right" type="submit">
                <i class="glyphicon glyphicon-ok"></i>
                Create Semester
            </button>
        </div>

        {{Form::close()}}
    </div>
</div>

@stop
