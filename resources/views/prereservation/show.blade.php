@extends('layouts.master')

@section('content')
<div class="container pb-5 pt-5">
    @include('stuffs.alerts')
    
    <div class="row  ">
        
        <div class="col-md-8 pt-4">
            <form method="POST" action="{{ route('prereservation.store', ['schedule' => $schedule->id, 'therapist' => $user->id ]) }}">
                @csrf
                <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name','',['class'=>'form-control','value'=> old('name')])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact_number','Contact Number')}}
                    {{Form::text('contact_number','',['class'=>'form-control','maxlength' => '11', 'minlength' => '11','value'=> old('contact_number')])}}
                </div>
                
                
                <div class="form-group">
                    {{-- {{Form::label('service','Service')}}
                    {{Form::text('service', $service->name,['class'=>'form-control','maxlength' => '11', 'minlength' => '11','value'=> $service->id, 'disabled'])}}
                    {{Form::hidden('service', $service->name, ['class'=>'form-control ', 'value'=> $service->name])}}
                    {{Form::hidden('category', $service->name, ['class'=>'form-control ', 'value'=> $service->name])}} --}}

                    <select class="form-control custom-select {{ $errors->has('service') ? 'custom-alert' : ''}} service" name="service" id="service" >
                        @if(App\Reservation::checkNR($schedule->id, $user->id) == 0)
                            <option value="1">Half Body Massage</option>
                            <option value="2">Whole Body Massage</option>
                        @else
                            <option value="1">Half Body Massage</option>
                        @endif
                    </select>
                </div>
                <p>Duration: <span id="minutes" class="float-right">45 mins</span></p>
            </div>
            <div class="col-md-4 pt-3">
                <h1 class="arizonia d-flex justify-content-center">Your Reservation</h1>
                <ul class="list-group">
                    <li class="list-group-item">
                        <p class="m-0">Therapist: &nbsp;  <span id="staff"  class="float-right"> Ms. {{$user->name}} </span></p>
                    </li>
                    {{-- <li class="list-group-item">
                        <p class="m-0">Category: &nbsp;  <span id="category_type"  class="float-right"> {{ $service->name }}</span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="m-0">Service: &nbsp;  <span id="service_name" class="float-right"> {{ $service->name }} </span></p>
                    </li> --}}
                    {{--<li class="list-group-item">
                        <p class="m-0">Duration: &nbsp;  <span id="service_minutes" class="float-right"> {{ $service->minutes }} mins </span></p>
                    </li>  --}}
                    <li class="list-group-item">
                        <p class="m-0">Date: &nbsp;  <span class="float-right"> {{ now()->parse()->toFormattedDateString()}} </span></p>
                    </li>
                    <li class="list-group-item">
                        <p class="m-0">Time <span id="time" class="float-right">{{Carbon::parse($schedule->sched_time)->format('h:i A')}}</span></p>
                        {{Form::hidden('time',$schedule->sched_time,['class'=>'form-control ', 'value'=> $schedule->sched_time,])}}
                    </li>
                    <li class="list-group-item image-colored-right text-white">
                        <p class="m-0 font-weight-bold">TOTAL COST <span id="total_price" class="float-right">Php 400.00</span></p>
                    </li>
                    
                    {{Form::submit('Submit',['class'=>'btn btn-primary float-right mt-2 image-colored-left'])}}
                    
                </ul>
                <small>&nbsp; Please check your details carefully</small>
            </div>
        </div>
    </form>
</div>
<div class="para pt-5" style="background-image: url({{asset('images/bg3.jpg')}})">
    {{-- <div class="caption">
        <span class="border"> Thank you for reserving </span>
    </div> --}}
</div>
@endsection