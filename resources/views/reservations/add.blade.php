@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary d-flex justify-content-between">
                    <h4 class="card-title">Adding Old Reservations</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <form action="{{ route('reservation.save') }}" method="POST">
                        @method('PUT')
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
                            {{Form::label('title','Date')}}
                            {{Form::date('reserved_date','',['class'=>'form-control'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('time','Time')}}
                            <select class="form-control custom-select {{ $errors->has('schedule_id') ? 'custom-alert' : ''}}" name="schedule_id" id="schedule_id" >
                                @foreach($schedules as $schedule)
                                <option value={{$schedule->id}}>{{Carbon::parse($schedule->sched_time)->format('g:i A')}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(Auth::user()->role == 'admin')
                        <div class="form-group">
                            <label for="staff">Therapist</label>
                            <select class="form-control custom-select {{ $errors->has('therapist_id') ? 'custom-alert' : ''}}" name="therapist_id" id="therapist_id" >
                                    @foreach($staffs as $staff)
                                        <option value={{$staff->id}}>{{$staff->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        @else
                            <input type="text" hidden value="{{Auth::user()->id}}" name="staff">
                        @endif
                        <div class="form-group">
                            {{Form::label('service','Service')}}
                            <select class="form-control custom-select {{ $errors->has('service_id') ? 'custom-alert' : ''}}" name="service_id" id="service_id" >
                                @foreach($services as $service)
                                <option value={{$service->id}}>{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('role','Role')}}
                            <select class="form-control custom-select {{ $errors->has('role') ? 'custom-alert' : ''}}" name="role" id="role" >
                                <option value='walkin'>Walk-in</option>
                                <option value='guest'>Guest</option>
                            </select>
                        </div>
                        <div class="form-group" id="addons">
                            <div class="form-check">
                                @foreach($addons as $addon)
                                <label class="form-check-label" style="padding-right: 10px;" >
                                    <input class="form-check-input addons" type="checkbox" value="{{$addon->option}}" name="addon[]"data-option="{{$addon->option}}" data-price="{{$addon->price}}" data-addonid="{{$addon->id}}"> {{$addon->option}}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
