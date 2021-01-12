@extends ('dashboard.layouts.main')
@section('content')

<div class="content">
    <div class="container-fluid">
        @include('stuffs.alerts')
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Trash</h4>
                <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead class="text-primary">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Deleted At</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($reservations as $reserve)
                        <tr>
                            <td>{{$reserve->id}}</td>
                            <td>{{$reserve->name}}</td>
                            <td>{{$reserve->contact_number}}</td>
                            <td>{{Carbon::parse($reserve->deleted_at)->toFormattedDateString()}}</td>
                            <td>
                                <a href="{{ route ('reservation.restore', ['id' => $reserve->id] )}}" class="btn btn-primary">Restore</a>
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