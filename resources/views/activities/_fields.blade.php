<div class="form-group">
    {{Form::label('title')}}
    {{Form::text('title',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('description')}}
    {{Form::text('description',null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('date')}}
    {{Form::date('date',isset($activity) ? date('Y-m-d', $activity->starts->timestamp):null, ['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('starts')}}
    {{Form::time('starts',isset($activity) ? date('H:i',$activity->starts->timestamp) : null,['class'=>'form-control'])}}
</div>

<div class="form-group">
    {{Form::label('ends')}}
    {{Form::time('ends',isset($activity) ? date('H:i',$activity->ends->timestamp) : null,['class'=>'form-control'])}}
</div>

