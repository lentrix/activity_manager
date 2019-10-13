@extends('main')

@section('content')

<div class="modal" id="modal1">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['url'=>"/activities/$activity->id/add-checking", "method"=>'post']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="glyphicon glyphicon-remove"></i>
                </button>
                <h4 class="modal-title">Add Checking Schedule</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('label')}}
                    {{Form::text('label',null,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('open','Open Time')}}
                    {{Form::text('open',null,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('close','Close Time')}}
                    {{Form::text('close',null,['class'=>'form-control'])}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

<h1>Edit Activity</h1>

<ul class="breadcrumb">
    <li><a href="{{url('/home')}}">Home</a></li>
    <li><a href="{{url('/activities')}}">Activities</a></li>
    <li class="active">Edit Activity | {{$activity->title}}</li>
</ul>

@include('messages')

<div class="row">
    <div class="col-lg-6">
        {!! Form::model($activity, ['url'=>"/activities/$activity->id", 'method'=>'patch']) !!}

        @include('activities._fields')

        <div class="form-group">
            <button class="btn btn-primary pull-right">
                <i class="glyphicon glyphicon-edit"></i>
                Update Activity
            </button>
        </div>

        {!! Form::close() !!}
    </div>
    <div class="col-lg-6">

        <h3>
            <button class="btn btn-primary btn-sm pull-right"
                    title="Add checking schedule"
                    data-toggle="modal" data-target="#modal1">
                <i class="glyphicon glyphicon-plus"></i>
            </button>
            Checking Schedules
        </h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Label</th>
                    <th>Open Time</th>
                    <th>Close Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activity->attScheds as $attSched)
                <tr>
                    <td>{{$attSched->label}}</td>
                    <td>{{$attSched->open}}</td>
                    <td>{{$attSched->close}}</td>
                    <td>
                        <a href='{{url("/activities/att-sched/$attSched->id/delete")}}'
                                    class="btn btn-danger btn-xs">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop