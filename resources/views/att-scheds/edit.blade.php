@extends('main')

@section('content')

<h1>Edit Checking Schedule</h1>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('/activities')}}">Activities</a></li>
    <li class="breadcrumb-item"><a href="{{url('/activities/' . $attSched->activity_id)}}">{{$attSched->activity->title}}</a></li>
    <li class="breadcrumb-item active">Update Checking Schedule</li>
</ul>

<div class="row">
    <div class="col-md-5">
        <h3>Activity Details</h3>
        <table class="table table-bordered table-striped">
            <tr>
                <td>
                    <strong>Title</strong>
                    {{$attSched->activity->title}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Description</strong>
                    {{$attSched->activity->description}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Date</strong>
                    {{$attSched->activity->starts->format('M d, Y g:i A')}}
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        {!! Form::model($attSched,['url'=>"/att-sched/$attSched->id", 'method'=>'patch']) !!}

        <div class="form-group">
            {{Form::label("label")}}
            {{Form::text("label",null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label("open",'Open Time')}}
            {{Form::time("open",$attSched->open,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label("close",'Close Time')}}
            {{Form::time("close",$attSched->close,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label("fine",'Fine')}}
            {{Form::text("fine",null,['class'=>'form-control'])}}
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary float-right">
                Update Attendance Schedule
            </button>
        </div>

        {!! Form::close() !!}
    </div>
</div>

@stop
