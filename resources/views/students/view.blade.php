@extends('main')

@section('content')

<h1>Student View</h1>

<div class="row">

    <div class="col-lg-3">
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
                        <th>ID</th><td>{{$student->id}}</td>
                    </tr>
                    <tr>
                        <th>LN</th><td>{{$student->lname}}</td>
                    </tr>
                    <tr>
                        <th>FN</th><td>{{$student->fname}}</td>
                    </tr>
                    <tr>
                        <th>PR</th><td>{{$student->program}}</td>
                    </tr>
                    <tr>
                        <th>YR</th><td>{{$student->year}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <h3>Summary of Attendance</h3>
        <h4>Present In..</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Attendances</th>
                    <th>Check Time</th>
                    <th>Checked by</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->currentAccount->present() as $attSched)
                    <?php $attCheck = $attSched->attCheck($student->currentAccount); ?>
                <tr>
                    <td>{{$attSched->activity->title}}</td>
                    <td>{{$attSched->label}}</td>
                    <td>{{$attCheck->check_time}}</td>
                    <td>{{$attCheck->user->username}}</td>
                </tr>

                @endforeach
            </tbody>
        </table>

        <h4>Discarded Attendances</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Attendances</th>
                    <th>Check Time</th>
                    <th>Checked by</th>
                    <th>Fines</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                @foreach($student->currentAccount->discard() as $attSched)
                    <?php $attCheck = $attSched->attCheck($student->currentAccount); ?>
                <tr>
                    <td>{{$attSched->activity->title}}</td>
                    <td>{{$attSched->label}}</td>
                    <td>{{$attCheck->check_time}}</td>
                    <td>{{$attCheck->user->username}}</td>
                    <td>{{$attSched->fine}}</td>
                </tr>
                    <?php $total += $attSched->fine; ?>
                @endforeach
            </tbody>
        </table>

        <h4>Absent In..</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Activity</th>
                    <th>Attendances</th>
                    <th>Fine</th>
                </tr>
            </thead>
            <tbody>
                @foreach($student->currentAccount->absent() as $attSched)

                <tr>
                    <td>{{$attSched->activity->title}}</td>
                    <td>{{$attSched->label}}</td>
                    <td class="right">{{$attSched->fine}}</td>
                </tr>
                    <?php $total += $attSched->fine; ?>
                @endforeach
            </tbody>
        </table>

        <span class="float-right big">Php {{number_format($total, 2)}}</span>
        <span class="big">Total Fines</span>
    </div>

</div>

@stop
