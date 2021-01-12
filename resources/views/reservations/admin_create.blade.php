@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Add New Reservation</h4>
                <p class="card-category"></p>
                </div>
            <div class="card-body">
                <div class="row">
                    
                    <div class="col-md-8">
                    {!! Form::open(['action' => 'AdminPostController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('name','Name')}}
                        {{Form::text('name','',['class'=>'form-control','value'=> old('name')])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('number','Contact Number')}}
                        {{Form::text('number','',['class'=>'form-control','maxlength' => '11', 'value'=> old('number')])}}
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
                    <div class="form-group">
                        {{Form::label('type','Type')}}
                        <select class="form-control custom-select" name="type" id="type" >
                            <option value="guest">Guest</option>
                            <option value="walkin">Walk-in</option>
                            
                        </select>
                    </div>
        

                </div>
                <div class="col-md-4 pt-3">
                    <h1 class="arizonia d-flex justify-content-center">Details</h1>
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

                        <li class="list-group-item">
                            <p class="m-0">Date: &nbsp;  <span class="float-right"> {{ Carbon::parse($dt)->toFormattedDateString()}} </span></p>
                            {{Form::hidden('date',$dt,['class'=>'form-control ', 'value'=> $dt])}}
                        </li>
                        <li class="list-group-item">
                            <p class="m-0">Time <span id="time" class="float-right">{{Carbon::parse($uniID->sched_time)->format('h:i A')}}</span></p>
                            {{Form::hidden('time',$uniID->sched_time,['class'=>'form-control ', 'value'=> $uniID->sched_time,])}}
                        </li>

                            {{Form::hidden('price','0',['class'=>'form-control ', 'value'=> '0'])}}
                            {{Form::hidden('sched_id',$id,['class'=>'form-control ', 'value'=> $id])}}
                            {{Form::hidden('staff_id',$staff_id,['class'=>'form-control ', 'value'=> $staff_id])}}

                            {{Form::submit('Submit',['class'=>'btn btn-primary float-right mt-2 image-colored-left'])}}
                        
                    </ul>
                    <small>&nbsp; Please check the details carefully</small>
                </div>
            </div>
            
            {!! Form::close() !!}

        </div>
            </div>
        </div>
    </div>
</div>

@endsection



