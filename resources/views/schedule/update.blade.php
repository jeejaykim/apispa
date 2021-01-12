@extends('layouts.main')

@section('content')

    <h1>Update Schedule</h1>

    {!! Form::open(['action' => ['ScheduleController@update',$schedule->id], 'method' => 'POST']) !!}

        <div class="form-group">
            {{Form::label('title','Contact Number')}}
            {{Form::text('number',$schedule->sched_time,['class'=>'form-control','placeholder'=>'Contact Number'])}}
        </div>


        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}



@endsection