@extends('dashboard.layouts.main')

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary d-flex justify-content-between">
                <h4 class="card-title">Reservations to {{$staff->name}} for {{$type}}</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Category ID</th>
                                <th>Price</th>
                                <th>Time Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservation as $reserve)
                            <tr>
                                <td>{{$reserve->id}}</td>
                                <td>{{$reserve->name}}</td>
                                <td>{{$reserve->category_id}}</td>
                                <td>{{$reserve->price}}</td>
                                <td>{{$reserve->created_at->toDayDateTimeString()}}</td>
                                <td>
                                    <form action="{{ route('reservations.destroy', ['reservation' => $reservation->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="float:right; margin-left:5px;"><i class="material-icons">delete</i></button>
                                    </form>
                                    <a href="/reservations/{{$reservation->id}}" class="btn btn-primary" style="float:right; margin-left:5px;"><i class="material-icons">edit</i></a>
                                    <a href="/show_addons/{{$reservation->id}}" class="btn btn-primary "  style="float:right;"><i class="material-icons">add</i></a>
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