<div class="col-lg-3 col-md-6 col-sm-6">
        <a href="{{route ('reservation.index')}}">
            <div class="card card-stats hvr-float">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">account_circle</i>
                    </div>
                    <p class="card-category">New Reservations</p>
                    <h3 class="card-title"> {{$reservations->where('active', 0)->count()}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Last 24 Hours
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <a href="{{route ('dashboard.allreservations')}}">
            <div class="card card-stats hvr-float">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">account_circle</i>
                    </div>
                    <p class="card-category">All Reservations</p>
                    <h3 class="card-title"> {{$reservations->where('active', 1)->count()}} 
                        <small></small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Whole 2019
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <a href="{{route ('record.revenue', ['data'=>'today', 'month' => now()->format('m')])}}">
            <div class="card card-stats hvr-float">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">store</i>
                    </div>
                    <p class="card-category">Revenue Today</p>
                    <h3 class="card-title">₱ {{$sales}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> {{Carbon::now()->toFormattedDateString()}}
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <a href="{{route ('record.revenue', ['data'=>'total', 'month' => now()->format('m')])}}">
            <div class="card card-stats hvr-float">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <p class="card-category">Total Revenue</p>
                    <h3 class="card-title">₱ {{$total_sales}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i>Whole 2019
                    </div>
                </div>
            </div>
        </a>
    </div>