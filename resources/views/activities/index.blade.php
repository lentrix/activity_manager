
@extends('main')

@section('content')

<div class="row">
    <div class="col-lg-2">
        <a href="{{url('/activity/create')}}" class="btn btn-default btn-block">Create Activity</a>
    </div>
    <div class="col-lg-10">
        <h1>Recent Activities</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name of Activity</th>
                    <th>Date</th>
                    <th>Time Start</th>
                    <th>Time End</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@stop
