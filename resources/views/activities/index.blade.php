
@extends('main')

@section('content')


<h1>
    <a href='{{url("/activities/create")}}' class="btn btn-primary pull-right">
        <i class="glyphicon glyphicon-ok"></i>
        Create Activity
    </a>
    Recent Activities
</h1>

<ul class="breadcrumb">
    <li><a href="{{url('/')}}">Home</a></li>
    <li class="active">Activities</li>
</ul>

@include('messages')

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Name of Activity</th>
            <th>Description</th>
            <th>Time Start</th>
            <th>Time End</th>
            <th>
                Action
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $act)
        <tr>
            <td>{{$act->title}}</td>
            <td>{{$act->description}}</td>
            <td>{{$act->starts}}</td>
            <td>{{$act->ends}}</td>
            <td>
                <a href='{{url("/activities/$act->id")}}' class="btn btn-success btn-xs" title="Edit Activity">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
