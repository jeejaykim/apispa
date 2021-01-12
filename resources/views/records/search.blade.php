@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary d-flex justify-content-between">
                    <h4 class="card-title">You have searched for "{{$data}}"</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Service</th>
                                <th>Time Reserved</th>
                                <th>Date Reserved</th>
                                <th>Therapist</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reservation)
                            <tr>
                                <td>{{$reservation->id}}</td>
                                <td>{{$reservation->name}}</td>
                                <td>{{$reservation->contact_number}}</td>
                                <td>{{$reservation->service->name}}</td>
                                <td>{{Carbon::parse($reservation->schedule->sched_time)->format('h:i A')}}</td>
                                <td>{{Carbon::parse($reservation->reserved_date)->toformattedDateString()}}</td>
                                <td>{{$reservation->therapist->name}}</td>
                                <td>{{$reservation->getStatus($reservation->id)}}</td>
                                <td>
                                    <form action="{{ route('reservation.destroy', ['reservation' => $reservation->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="float:right; margin-left:5px;"><i class="material-icons">delete</i></button>
                                    </form>
                                    <a href="/reservations/{{$reservation->id}}" class="btn btn-primary" style="float:right; margin-left:5px;"><i class="material-icons">edit</i></a>
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