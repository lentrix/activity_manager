@extends('main')

@section('content')



<h1>
    <a href="{{url('/semesters/create')}}"
            class="btn btn-primary pull-right">
    <i class="glyphicon glyphicon-plus"></i>
        Add Semester
    </a>
    Semesters
</h1>

<ul class="breadcrumb">
    <li><a href="{{url('/')}}">Home</a></li>
    <li class="active">Semesters</li>
</ul>

@include('messages')

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Prefix</th>
            <th>Accronym</th>
            <th>Semester</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($semesters as $sem)
        <tr>
            <td>{{$sem->prefix}}</td>
            <td>{{$sem->accronym}}</td>
            <td>{{$sem->semester}}</td>
            <td>
                @if($sem->active)
                    <i class="glyphicon glyphicon-ok"></i>
                @else
                    <i class="glyphicon glyphicon-remove"></i>
                @endif
            </td>
            <td>
                <a href='{{url("/semesters/$sem->id")}}' class="btn btn-success btn-xs" title="Edit Semester">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop
