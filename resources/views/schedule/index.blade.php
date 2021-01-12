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
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th>#</th>
                                <th>Scheduled Time</th>
                                <th>Created At</th>
                                <th><a href="{{route('schedule.create')}}" class="btn btn-primary" style="float:right; margin-left:5px;">Create</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedule as $sched)
                            <tr>
                                <td>{{$sched->id}}</td>
                                <td>{{Carbon::parse($sched->sched_time)->format('h:i A')}} </td>
                                <td>{{Carbon::parse($sched->created_at)->toFormattedDateString()}}</td>
                                <td>
                                    <form action="{{ route('schedule.destroy', ['sched' => $sched->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="float:right; margin-left:5px;"><i class="material-icons">delete</i></button>
                                    </form>
                                </td>
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