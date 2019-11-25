@extends('main')

@section('content')

<h1>Add Student</h1>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('/students')}}">Students</a></li>
    <li class="breadcrumb-item active">Create Student</li>
</ul>

<div class="row">
    <div class="col-md-5">
        {!! Form::open(['url'=>'/students', 'method'=>'post']) !!}

        <div class="form-group">
            {{Form::label('lname','Last Name')}}
            {{Form::text('lname',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('fname','First Name')}}
            {{Form::text('fname',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('program','Program')}}
            {{Form::text('program',null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('year','Year')}}
            {{Form::text('year',null,['class'=>'form-control', 'maxlength'=>1])}}
        </div>

        <div class="form-group">
            <button class="btn btn-primary float-right">
                <i class="fa fa-plus"></i> Save New Student
            </button>
        </div>

        {!! Form::close() !!}
    </div>

    <div class="col">
        <div class="alert alert-warning">
            <h3>Notice!</h3>
            <p>
                This facility is only intended for adding students who are late enrolees--those
                who were enrolled after the data has been imported from the Student Information System.
                Do not use this for purposes of data entry for all students in the semester.
            </p>
            <p>
                For the latter, please acquire the list of students from the Student Information System.
                Once you have the list in a .json file, you may use the import facility of this
                web application to import the students and store it in this database.
            </p>
            <p>
                If you are not sure what to do, please contact the Systems Administrator
                for assistance.
            </p>
        </div>
    </div>
</div>
@stop
