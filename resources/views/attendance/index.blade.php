@extends('dashboard.layouts.main')

@section('content')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @include('stuffs.alerts')
                @include('users.nav')
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <td>Date</td>
                                <td>Users</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dates as $day)
                            <tr>
                                <tr>
                                    <td rowspan={{$day->countUser($day->date)}}>{{$day->date}}</td>
                                    @foreach($day->getUser($day->date) as $attendance)
                                    <td>{{$attendance->user->name}}</td>
                                    <td>{{$attendance->status}}</td>
                                    <td>
                                        <form action="{{ route('attendance.destroy', ['staff' => $attendance->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="float:right; margin-right:5px;"><i class="material-icons">delete</i></button>
                                        </form>
                                        <a href="{{route('attendance.edit', ['user' => $attendance->id])}}" class="btn btn-primary " style="float:right;"><i class="material-icons">edit</i></a> 
                                    </td>
                                </tr>
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection