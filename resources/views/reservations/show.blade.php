@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary d-flex justify-content-between">
                    <h4 class="card-title">Update Reservation</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <form action="{{ route('reservation.update', ['reservation' => $reservation->id])}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value={{$reservation->name}}>
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" maxlength="11" minlength="11" name="contact_number" value={{$reservation->contact_number}}>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control"  name="reserved_date" value={{$reservation->reserved_date}}>
                            
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <select class="form-control custom-select {{ $errors->has('schedule_id') ? 'custom-alert' : ''}}" name="schedule_id" id="schedule_id" >
                                <option value="{{$reservation->schedule->id}}"selected hidden>{{Carbon::parse($reservation->schedule->sched_time)->format('h:i A')}}</option>
                                @foreach($schedules as $schedule)
                                <option value={{$schedule->id}}>{{Carbon::parse($schedule->sched_time)->format('h:i A')}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Therapist</label>
                            <select class="form-control custom-select {{ $errors->has('therapist_id') ? 'custom-alert' : ''}}" name="therapist_id" id="therapist" >
                                <option value="{{$reservation->therapist->id}}"selected hidden>{{$reservation->therapist->name}}</option>
                                @foreach($staffs as $staff)
                                <option value={{$staff->id}}>{{$staff->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Service</label>
                            <select class="form-control custom-select {{ $errors->has('service_id') ? 'custom-alert' : ''}}" name="service_id" id="service" >
                                <option value="{{$reservation->service->id}}"selected hidden>{{$reservation->service->name}}</option>
                                @foreach($services as $service)
                                <option value={{$service->id}}>{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control custom-select {{ $errors->has('role') ? 'custom-alert' : ''}}" name="role" id="role" >
                                <option value="{{$reservation->role}}"selected hidden>{{$reservation->role}}</option>
                                <option value='walkin'>Walk-in</option>
                                <option value='guest'>Guest</option>
                            </select>
                        </div>
                        <div class="form-group">
                                <label>Status</label>
                                <select class="form-control custom-select {{ $errors->has('active') ? 'custom-alert' : ''}}" name="active" id="active" >
                                    <option value="{{$reservation->active}}"selected hidden>{{($reservation->active==1) ? "Active" : "Inactive"}}</option>
                                    <option value='1'>Active</option>
                                    <option value='0'>Inactive</option>
                                </select>
                            </div>
                        <div class="form-group" id="addons">
                            <div class="form-check">
                                @foreach($addons as $addon)
                                <label class="form-check-label" style="padding-right: 10px;" >
                                    <input class="form-check-input addons" type="checkbox" value="{{$addon->id}}" name="addon[]" {{($reservation->addon->contains($addon->id) ? 'checked' : '')}}> {{$addon->option}}
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
