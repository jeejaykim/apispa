@extends ('dashboard.layouts.main')
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
                                <th>ID</th>
                                <th></th>
                                <th>Name</th>
                                <th>Customers Served</th>
                                <th>Status</th>
                                <th>Active</th>
                                <th><a href="{{ route('user.create') }}" class="btn btn-primary " style="float:right;">Add New User</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($staffs as $staff)
                            <tr>
                                <td>{{$staff->id}}</td>
                                <td><a href="{{route('user.profile',['user' => $staff->id])}}"><img src="/storage/avatars/{{$staff->avatar}}" alt="" style="width:50px;height:auto;border-radius:50%;" ></a></td>
                                <td><a href="{{route('user.profile',['user' => $staff->id])}}">{{$staff->name}}</a></td>
                                <td>{{$staff->countData(now(), 'served')}}</td>
                                @if($staff->status == 1)
                                <td>Active</td>
                                @else
                                <td>Inactive</td>
                                @endif
                                @if($staff->status == 0)
                                <td>
                                    <a href="{{ route('user.activate', ['user' => $staff->id]) }}" class="btn btn-primary ">Activate</a>
                                </td>
                                @else
                                <td>
                                    <a href="{{ route('user.deactivate', ['user' => $staff->id ]) }}" class="btn btn-primary ">De-activate</a>
                                </td>
                                @endif
                                <td>
                                    <form action="{{ route('user.destroy', ['staff' => $staff->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="float:right; margin-right:5px;"><i class="material-icons">delete</i></button>
                                    </form>
                                    <a href="{{route('user.edit', ['user' => $staff->id])}}" class="btn btn-primary " style="float:right;"><i class="material-icons">edit</i></a> 
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