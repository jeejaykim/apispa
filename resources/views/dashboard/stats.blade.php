<div class="col-lg-3 col-md-6">
    <div class="card card-chart">
        <div class="card-header card-header-warning">
            <div class="ct-chart" id="WeeklyChart"></div>
        </div>
        <div class="card-body">
        <h4 class="card-title">Total customers per day of {{Carbon::parse("2019-".$month."-01")->format('F')}}</h4>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-header card-header-info">
            <h4 class="card-title">Status</h4>
            <p class="card-category"></p>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <td>Average Customer per Day</td>
                        <td>{{App\Dashboard::getAverage('day', $month)}}</td>
                    </tr>
                    <tr>
                        <td>Average Customer per Week</td>
                        <td>{{App\Dashboard::getAverage('week', $month)}}</td>
                    </tr>
                    <tr>
                        <td>Average Customer per Month</td>
                        <td>{{App\Dashboard::getAverage('year', $month)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>