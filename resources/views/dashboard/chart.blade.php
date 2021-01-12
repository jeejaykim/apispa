<div class="card card-chart">
    <div class="card-header card-header-success">
        <div class="ct-chart" id="TodayChart"></div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div>
                <h4 class="card-title">
                    @if($data == 'total')
                        Total Sales
                    @else
                        Daily Sales
                    @endif
                </h4>
                <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> {{App\Dashboard::getPercent($data, $month)}}% </span> increase in {{$data}} sales.</p>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="dropdown">
                        <button class="btn btn-white dropdown-toggle" type="button" data-toggle="dropdown">{{Carbon::parse("2019-".$month."-01")->format('F')}}</button>
                        <ul class="dropdown-menu">
                            @for($i=1;$i<=12;$i++)
                            <li><a href="{{ route('dashboard.index',['data' => $data, 'month' =>$i])}}">{{Carbon::parse("2019-".$i."-01")->format('F')}}</a></li>
                            @endfor
                        </ul>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-white dropdown-toggle" type="button" data-toggle="dropdown">{{$data}}</button>
                        <ul class="dropdown-menu">
                            @if($month == now()->format('m'))
                            <li><a href="{{ route('dashboard.index',['data' => 'today', 'month' => $month])}}">Revenue Today</a></li>
                            @endif
                            <li><a href="{{ route('dashboard.index',['data' => 'total', 'month' => $month])}}">Total Revenue</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="card-footer">
            <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
            </div>
        </div> --}}
    </div>