@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add New Schedule</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">

                {!! Form::open(['action' => 'ScheduleController@store', 'method' => 'POST']) !!}

                    <div class="form-group">
                        {{Form::label('sched_time','Time')}}      
                            <select class="form-control custom-select {{ $errors->has('sched_time') ? 'custom-alert' : ''}}" placeholder="Select Time" name="sched_time" id="sched_time" value="{{ old('time') }}">
                                <option value="10:00:00">10:00 AM</option>
                                <option value="11:00:00">11:00 AM</option>
                                <option value="12:00:00">12:00 PM</option>
                                <option value="13:00:00">01:00 PM</option>
                                <option value="14:00:00">02:00 PM</option>
                                <option value="15:00:00">03:00 PM</option>
                                <option value="16:00:00">04:00 PM</option>
                                <option value="17:00:00">05:00 PM</option>
                                <option value="18:00:00">06:00 PM</option>
                                <option value="19:00:00">07:00 PM</option>
                                <option value="20:00:00">08:00 PM</option>
                                <option value="21:00:00">09:00 PM</option>
                                <option value="22:00:00">10:00 PM</option>
                                <option value="23:00:00">11:00 PM</option>
                            </select>
                        <small id="time" class="form-text text-muted">Please select the new schedule you want to add.</small>
                    </div>
                    
                    

                    {{Form::submit('Submit',['class'=>'btn btn-primary pull-right'])}}
                {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection