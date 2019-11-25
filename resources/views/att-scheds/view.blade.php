@extends('main')

@section('content')

<h1>View Checking Schedule</h1>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('/activities')}}">Activities</a></li>
    <li class="breadcrumb-item"><a href="{{url('/activities/' . $attSched->activity_id)}}">{{$attSched->activity->title}}</a></li>
    <li class="breadcrumb-item active">View Checking Schedule</li>
</ul>

<div class="row">
    <div class="col-md-4">
        <h3>Activity Details</h3>
        <table class="table table-bordered table-striped">
            <tr>
                <td>
                    <strong>Title</strong> <br>
                    {{$attSched->activity->title}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Description</strong> <br>
                    {{$attSched->activity->description}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Date</strong> <br>
                    {{$attSched->activity->starts->format('M d, Y g:i A')}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Checking Schedule | {{$attSched->label}}</strong> <br>
                    {{$attSched->open->format('M d, Y')}}
                    {{$attSched->open->format('g:i A')}} -
                    {{$attSched->close->format('g:i A')}}
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-8">
        <h3>Attendance Checks</h3>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Attendee</th>
                    <th>Check Time</th>
                    <th>Checked by</th>
                </tr>
            </thead>
            <tbody>
                @foreach($checks as $student=>$check)

                <tr>
                    <td>{{$student}}</td>
                    <td>{{$check['checkTime']->format("M d, Y g:i A")}}</td>
                    <td>{{$check['checkBy']}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
