@extends('main')

@section('content')

<h1>Edit Semester</h1>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('/semesters')}}">Semesters</a></li>
    <li class=" breadcrumb-item active">Edit Semester - {{$semester->accronym}}</li>
</ul>

<div class="row">
    <div class="col-lg-6">
        {!! Form::model($semester, ['url'=>"/semesters/$semester->id",'method'=>'patch']) !!}

        @include('semesters._fields')

        <div class="form-group">
            <button class="btn btn-primary" type="submit">
                <i class="glyphicon glyphicon-edit"></i>
                Update Semester
            </button>
            @if(!$semester->active)
            <a href='{{url("/semesters/$semester->id/activate")}}' class="btn btn-info">
                <i class="glyphicon glyphicon-ok"></i>
                Activate
            </a>
            @endif
        </div>

        {!! Form::close() !!}
    </div>
</div>
@stop
