<div class="card">
    <div class="card-header card-header-warning">
        <h4 class="card-title">Employees Stats</h4>
        <p class="card-category"></p>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover">
            <thead class="text-warning">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Customers Served</th>
                    <th>Total Earnings</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $staff)
                <tr>
                    <td>{{$staff->id}}</td>
                    <td><a href="{{route('user.profile', ['user' => $staff->id])}}" class="text-warning">{{$staff->name}}</a></td>
                    <td>{{$staff->countData(now(), 'served')}}</td>
                    <td>{{$staff->countData(now(), 'total_reservation')}}</td>
                    @if($staff->status == 1)
                    <td>Active</td>
                    @else
                    <td>Inactive</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{route ('user.index')}}"><span class="pull-right text-warning">Show more..</span></a>
    </div>
</div>