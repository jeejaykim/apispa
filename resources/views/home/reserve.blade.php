@extends('layouts.master')

@section('content')

<div class="container pb-5 pt-5">
    @include('stuffs.alerts')
    
    <div class="row  ">
        
        <div class="col-md-8 pt-4">
            {!! Form::open(['action' => 'PostController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name','',['class'=>'form-control','value'=> old('name')])}}
            </div>
            <div class="form-group">
                {{Form::label('number','Contact Number')}}
                {{Form::text('number','',['class'=>'form-control','maxlength' => '11', 'minlength' => '11','value'=> old('number')])}}
            </div>
            
            
            <div class="form-group">
                {{Form::label('service','Service')}}
                {{Form::text('service','',['class'=>'form-control','placeholder'=>'Full Body Massage', 'value'=> old('service'), 'disabled'])}}
                {{Form::hidden('service','Full Body Massage',['class'=>'form-control ', 'value'=> 'Full Body Massage'])}}
                {{Form::hidden('category','Full Body Massage',['class'=>'form-control ', 'value'=> 'Full Body Massage'])}}
                
            </div>
            
            <div class="form-group">
                {{Form::label('minutes','Minutes')}}
                <select class="form-control custom-select" name="minutes" id="minutes" >
                    @if($min==2)
                    <option value="45">45</option>
                    <option value="90">90</option>
                    @else
                    <option value="45">45</option>
                    @endif
                    
                </select>
            </div>
            
            
        </div>
        <div class="col-md-4 pt-3">
            <h1 class="arizonia d-flex justify-content-center">Your Reservation</h1>
            <ul class="list-group">
                <li class="list-group-item">
                    <p class="m-0">Therapist: &nbsp;  <span id="staff"  class="float-right"> Ms. {{$staff->name}} </span></p>
                    {{Form::hidden('staff',$staff->name,['class'=>'form-control ', 'value'=> $staff->name])}}
                </li>
                <li class="list-group-item">
                    <p class="m-0">Category: &nbsp;  <span id="category_type"  class="float-right"> Full Body Massage </span></p>
                </li>
                <li class="list-group-item">
                    <p class="m-0">Service: &nbsp;  <span id="service_name" class="float-right"> Full Body Massage  </span></p>
                </li>
                {{-- <li class="list-group-item">
                    <p class="m-0">Minutes: &nbsp;  <span id="service_minutes" class="float-right"> n/a  </span></p>
                </li> --}}
                <li class="list-group-item">
                    <p class="m-0">Date: &nbsp;  <span class="float-right"> {{ Carbon::parse($dt)->toFormattedDateString()}} </span></p>
                    {{Form::hidden('date',$dt,['class'=>'form-control ', 'value'=> $dt])}}
                </li>
                <li class="list-group-item">
                    <p class="m-0">Time <span id="time" class="float-right">{{Carbon::parse($uniID->sched_time)->format('h:i A')}}</span></p>
                    {{Form::hidden('time',$uniID->sched_time,['class'=>'form-control ', 'value'=> $uniID->sched_time,])}}
                </li>
                {{-- <li class="list-group-item image-colored-right text-white">
                    <p class="m-0 font-weight-bold">TOTAL COST <span id="total_price" class="float-right"></span></p>
                </li> --}}
                {{Form::hidden('price','0',['class'=>'form-control ', 'value'=> '0'])}}
                {{Form::hidden('sched_id',$id,['class'=>'form-control ', 'value'=> $id])}}
                {{Form::hidden('staff_id',$staff_id,['class'=>'form-control ', 'value'=> $staff_id])}}
                
                {{Form::submit('Submit',['class'=>'btn btn-primary float-right mt-2 image-colored-left'])}}
                
            </ul>
            <small>&nbsp; Please check your details carefully</small>
        </div>
    </div>
    
    {!! Form::close() !!}
    
</div>
<div class="para pt-5" style="background-image: url({{asset('images/bg3.jpg')}})">
    {{-- <div class="caption">
        <span class="border"> Thank you for reserving </span>
    </div> --}}
</div>

@endsection