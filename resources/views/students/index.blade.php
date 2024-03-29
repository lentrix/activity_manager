@extends('main')

@section('content')

<?php $stats = \App\StudSem::stats(); ?>

<div class="modal fade" tabindex="-1" role="dialog" id="searchmodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Search Students</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{Form::open(['url'=>'/students/search', 'method'=>'post'])}}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('key','Search Keyword')}}
                    {{Form::text('key',null,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    <input type="radio" name="criteria" id="id" value="id">
                    <label for="id">Student ID &nbsp;</label>

                    <input type="radio" name="criteria" id="lname" value="lname" checked="checked">
                    <label for="lname">Last Name &nbsp;</label>

                    <input type="radio" name="criteria" id="fname" value="fname">
                    <label for="fname">First Name &nbsp;</label>

                    <input type="radio" name="criteria" id="program" value="program">
                    <label for="program">Program &nbsp;</label>

                    <input type="radio" name="criteria" id="year" value="year">
                    <label for="year">Year &nbsp;</label>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i> Search Students
                </button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalimport">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import JSON File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{Form::open(['url'=>'/students/import', 'method'=>'post', 'files'=>true])}}
            <div class="modal-body">
                {{Form::label('file')}}
                {{Form::file('file',['class'=>'form-control','required'])}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-file-import"></i> Import File
                </button>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>


<h1>
    Students
    <button class="btn btn-secondary float-right" data-target="#searchmodal" data-toggle="modal">
        <i class="fa fa-search"></i> Search
    </button>
</h1>

@include('messages')

<div class="row">
    <div class="col-lg-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3>Figures</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>Total Population</th>
                        <td>{{$stats['total']}}</td>
                    </tr>
                    <tr>
                        <th>First Year</th>
                        <td>{{$stats['1']}}</td>
                    </tr>
                    <tr>
                        <th>Second Year</th>
                        <td>{{$stats['2']}}</td>
                    </tr>
                    <tr>
                        <th>Third Year</th>
                        <td>{{$stats['3']}}</td>
                    </tr>
                    <tr>
                        <th>Fourth Year</th>
                        <td>{{$stats['4']}}</td>
                    </tr>
                    <tr>
                        <th>Qualifying</th>
                        <td>{{$stats['Q']}}</td>
                    </tr>
                </table>

                <button class="btn btn-secondary" type='button' data-toggle='modal' data-target='#modalimport'>
                    <i class="fa fa-file-import"></i> Import..
                </button>

                <a href="{{url('/students/create')}}" class="btn btn-secondary">
                    <i class="fa fa-plus"></i> Add Student
                </a>
            </div>
        </div>
    </div>
    <div class="col">
        @if(count($students)==0)
            <p>No search results.</p>
        @else
            <p class="text-success">
                Search result for Field: "{{$request['criteria']}}"" Keyword: "{{$request['key']}}""
                {{count($students)}} records found.
            </p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Program</th>
                        <th>Year</th>
                        <th>
                            <i class="fa fa-bars"></i>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)

                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->lname}}</td>
                        <td>{{$student->fname}}</td>
                        <td>{{$student->program}}</td>
                        <td>{{$student->year}}</td>
                        <td>
                            <a href='{{url("/students/$student->id")}}' class="btn btn-sm btn-secondary">
                                <i class="fa fa-folder-open"></i>
                            </a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>


        @endif
    </div>
</div>

@stop
