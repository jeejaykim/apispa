@extends ('dashboard.layouts.main')
@section('content')

<div class="content">
    <div class="container-fluid">
        @include('stuffs.alerts')
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary d-flex justify-content-between ">
                    <h4 class="card-title">All Reservations</h4>
                    <a class="nav-link" href="" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h4 style="color:white;">ALL</h4>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">All</a>
                        <a class="dropdown-item" href="#">Active</a>
                        <a class="dropdown-item" href="#">Inactive</a>
                    </div>
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
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservations as $reserve)
                            <tr>
                                <td>{{$reserve->id}}</td>
                                <td>{{$reserve->name}}</td>
                                <td>{{$reserve->contact_number}}</td>
                                <td>{{$reserve->service->name}}</td>
                                <td>{{Carbon::parse($reserve->created_at)->format('h:i A')}}</td>
                                <td>{{Carbon::parse($reserve->reserved_date)->toformattedDateString()}}</td>
                                <td>{{$reserve->getStatus($reserve->id)}}</td>
                                <td>
                                    <form action="{{ route('reservation.destroy', ['reservation' => $reserve->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="float:right; margin-left:5px;"><i class="material-icons">delete</i></button>
                                    </form>
                                    <a href="/reservations/{{$reserve->id}}" class="btn btn-primary" style="float:right; margin-left:5px;"><i class="material-icons">edit</i></a>
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