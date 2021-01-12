@extends('dashboard.layouts.main')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            @include('stuffs.alerts')
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Edit attendance of {{$staff->name}} for {{Carbon::parse($attendance->date)->toformattedDateString()}}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('attendance.update', ['id' => $attendance->id]) }}">
                        @csrf
                        <div class="form-group pb-5">
                            <label for="expenses">Date</label>
                        <input type="date" class="form-control"name="date" id="date" value="{{$attendance->date}}">
                        </div>
                        <div class="form-group">
                            <label for="amount">Status</label>
                            <select name="status" id="status"class="form-control">
                                <option value="{{$attendance->status}}" hidden selected> 
                                    {{$attendance->status == 1 ? 'Active' : ($attendance->status == 0 ? 'Inactive' : 'Absent')}}
                                </option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                                <option value="2">Absent</option>
                            </select>
                        </div>
                        @method('PUT')
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection