@extends('main')

@section('content')

<h1>Student View</h1>

<div class="row">

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Student Detail</h3>
            </div>
            <div class="card-body">
                <div class="center" style="margin-bottom: 20px">
                {!! \QrCode::size(200)->backgroundColor(200,240,255)->generate("$student->id | $student->lname, $student->fname")   !!}
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>ID Number</th><td>{{$student->id}}</td>
                    </tr>
                    <tr>
                        <th>Last Name</th><td>{{$student->lname}}</td>
                    </tr>
                    <tr>
                        <th>First Name</th><td>{{$student->fname}}</td>
                    </tr>
                    <tr>
                        <th>Program</th><td>{{$student->program}}</td>
                    </tr>
                    <tr>
                        <th>Year</th><td>{{$student->year}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <h3>Summary of Attendance</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Attendances</th>
                    <th>Fines</th>
                </tr>
            </thead>
        </table>
    </div>

</div>

@stop
