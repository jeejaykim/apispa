<table class="table table-hover">
    <thead class="text-primary">
        <tr>
            <th>Name</th>
            <th>Contact No.</th>
            <th>Time</th>
            <th>Service</th>
            <th>Therapist</th>
            <th>Role</th>
            <th>Active</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($oldreservations as $reservation)
        <tr>
            <td>{{$reservation->name}}</td>
            <td>{{$reservation->contact_number}}</td>
            <td>{{Carbon::parse($reservation->schedule->sched_time)->format('h:i A')}}</td>
            <td>{{$reservation->service->name}}</td>
            <td>{{$reservation->therapist->name}}</td>
            <td>{{$reservation->role}}</td>
            <td>{{($reservation->active == 1) ? "Active": "Inactive"}}</td>
            <td>
                <form action="{{ route('reservation.destroy', ['reservation' => $reservation->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="float:right; margin-left:5px;"><i class="material-icons">delete</i></button>
                </form>
                <a href="{{ route('reservation.show', ['reservation' => $reservation->id]) }}" class="btn btn-primary" style="float:right; margin-left:5px;"><i class="material-icons">edit</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>