@extends('main')

@section('content')

<h1>Attendance Check Details</h1>

<div class="row">
    <div class="col-md-6">

        <table class="table table-bordered table-sm">
            <tr>
                <th class="table-info">Activity Name</th>
                <td>{{$attCheck->attSched->activity->title}}</td>
            </tr>
            <tr>
                <th class="table-info">Schedule of Activity</th>
                <td>{{$attCheck->attSched->activity->starts->format('M d, Y g:i A')}}</td>
            </tr>
            <tr>
                <th class="table-info">Student/Attendee</th>
                <td>{{$attCheck->studSem->student->fullName}}</td>
            </tr>
            <tr>
                <th class="table-info">Checking Label</th>
                <td>{{$attCheck->attSched->label}}</td>
            </tr>
            <tr>
                <th class="table-info">Schedule of Checking</th>
                <td>
                    Open - {{$attCheck->attSched->open->format('M d, Y g:i A')}} <br>
                    Close - {{$attCheck->attSched->close->format('M d, Y g:i A')}}
                </td>
            </tr>
            <tr>
                <th class="table-info">Check Time</th>
                <td>{{$attCheck->check_time->format('M d, Y g:i A')}}</td>
            </tr>
            <tr>
                <th class="table-info">Checked by</th>
                <td>{{$attCheck->user->username}}</td>
            </tr>
        </table>

    </div>
    <div class="col-md-3">
        {{Form::open(['url'=>"/att-check/$attCheck->id/validate", 'method'=>'post','style'=>'display: inline-block'])}}
            <button class="btn btn-primary btn-block" type="submit">
                <i class="fa fa-check"></i> Consider as Valid
            </button>
        {{Form::close()}}
    </div>
</div>

@stop
