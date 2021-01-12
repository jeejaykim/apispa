<div class="card">
    <div class="card-header card-header-success">
        <h4 class="card-title">Latest Reservations</h4>
        <p class="card-category"></p>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-hover">
            <thead class="text-success">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Reserved Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if((App\Reservation::checkData())==0)
                <td>No Latest Reservation</td>
                @else
                @for($i=0;$i<=2;$i++)
                <tr>
                    <td>{{App\Reservation::countData($i,'id')}}</td>
                    <td>{{App\Reservation::countData($i,'name')}}</td>
                    <td>{{Carbon::parse(App\Reservation::countData($i,'time'))->format('h:i A')}}</td>
                    <td>{{App\Reservation::countData($i,'status')}}</td>
                </tr>
                @endfor
                @endif
            </tbody>
        </table>
        <a href="{{route ('dashboard.allreservations')}}"><span class="pull-right text-success">Show more..</span></a>
    </div>
</div>