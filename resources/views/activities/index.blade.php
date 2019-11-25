
@extends('main')

@section('content')


<h1>
    <a href='{{url("/activities/create")}}' class="btn btn-primary float-right">
        <i class="fa fa-plus"></i>
        Create Activity
    </a>
    Recent Activities | {{$semester->prefix}}
</h1>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
    <li class="breadcrumb-item active">Activities</li>
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
            <td>{{$act->starts->format('D, M d, Y g:i A')}}</td>
            <td>{{$act->ends->format('D, M d, Y g:i A')}}</td>
            <td>
                <a href='{{url("/activities/$act->id")}}' class="btn btn-success btn-sm" title="Edit Activity">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
