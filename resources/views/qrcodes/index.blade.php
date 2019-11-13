@extends('main')

@section('content')

<h1>QRCode Generator</h1>

<div class="row">
    <div class="col-lg-3 no-print">
        <div class="card card-secondary">
            <div class="card-header">
                <h3>Selection</h3>
            </div>
            {{Form::open(['url'=>'/qrcodes', 'method'=>'post'])}}
            <div class="card-body">
                <div class="form-group">
                    <input type="radio" name="criteria" value="student_id" id="student_id">
                    <label for="student_id">Student ID</label>
                </div>
                <div class="form-group">
                    <input type="radio" name="criteria" value="lname" id="lname">
                    <label for="lname">Last Name</label>
                </div>
                <div class="form-group">
                    <input type="radio" name="criteria" value="fname" id="fname">
                    <label for="fname">First Name</label>
                </div>
                <div class="form-group">
                    <input type="radio" name="criteria" value="program" id="program">
                    <label for="program">Program</label>
                </div>
                <div class="form-group">
                    <input type="radio" name="criteria" value="year" id="year">
                    <label for="year">Year</label>
                </div>
                <div class="form-group">
                    <label for="key">Search Keyword</label>
                    <input type="text" name="key" id="key" class="form-control">
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" type="submit">Generate</button>
            </div>
            {{Form::close()}}
        </div>
    </div>
    <div class="col-lg-9">
        @if(count($list)>0)

        <div class="qr-grid">

        @foreach($list as $item)

        <div class="qrcode">
            {!! \QrCode::size(130)
                ->backgroundColor(230,250,255)
                ->generate("$item->id | $item->lname, $item->fname"); !!}
            <div class="center extra-small">
                [{{$item->id}}] {{$item->lname}}
            </div>
        </div>

        @endforeach

        </div>

        @endif
    </div>
</div>

@stop
