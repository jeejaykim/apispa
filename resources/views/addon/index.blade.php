@extends ('dashboard.layouts.main')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @include('stuffs.alerts')
                @include('reservations.nav')
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Time Created</th>
                                    <th><a href="{{ route('addon.create') }}" class="btn btn-primary" style="float:right; margin-left:5px;">Add New Add-ons</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($addons as $addon)
                                <tr>
                                    <td>{{$addon->id}}</td>
                                    <td>{{$addon->option}}</td>
                                    <td>{{$addon->price}}</td>
                                    <td>{{$addon->created_at->toDayDateTimeString()}}</td>
                                    <td>
                                        <form action="{{ route('addon.destroy', ['addon' => $addon->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="float:right; margin-left:5px;"><i class="material-icons">delete</i></button>
                                            <a href="{{ route('addon.show', ['id' => $addon->id]) }}" class="btn btn-primary" style="float:right; margin-left:5px;"><i class="material-icons">edit</i></a>
                                            
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
</div>
@endsection