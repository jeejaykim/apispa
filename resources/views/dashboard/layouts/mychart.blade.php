{{-- <script>
    @php
    $tmpReservation = json_encode($resCount);
    // $tmpData = json_encode($data);
    $tmpLabel = json_encode($label);
    $month = json_encode($month);
    
    echo "var resCount = ". $tmpReservation . ";\n";
    // echo "var data = ". $tmpData . ";\n";
    echo "var label = ". $tmpLabel . ";\n";
    echo "var month = ". $month .";";
    @endphp
    
    var monthlySalesChart = document.getElementById('monthlySalesChart').getContext('2d');
    
    var massPopChart = new Chart(monthlySalesChart, {
        
        type: 'line',
        
        data:{
            labels:label,
            datasets: [{
                label: month,
                data:resCount
            }]
        }
    })
</script>
--}}

<script>
    
    @php
    $tmpReservation = json_encode($resCount);
    $tmpLabel = json_encode($label);
    $month = json_encode($month);
    
    echo "var resCount = ". $tmpReservation . ";\n";
    echo "var label = ". $tmpLabel . ";\n";
    echo "var month = ". $month .";";
    @endphp
    
    md = {
        initDashboardPageCharts: function () {
            
            if ($('#TodayChart').length != 0 || $('#completedTasksChart').length != 0 || $('#WeeklyChart').length != 0) {
                
                dataTodayChart = {
                    labels: label,
                    series: [resCount]
                };
                
                optionsTodayChart = {
                    lineSmooth: Chartist.Interpolation.cardinal({
                        tension: 0
                    }),
                    low: 0,
                    // high: 41,
                    chartPadding: {
                        top: 0,
                        right: 0,
                        bottom: 0,
                        left: 0
                    },
                    axisY: {
                        onlyInteger: true,
                        offset: 20
                    }
                }
                
                var TodayChart = new Chartist.Line('#TodayChart', dataTodayChart, optionsTodayChart);
                
                md.startAnimationForLineChart(TodayChart);
                
            }
        }
    }
</script>

<script>
    @php
    echo "var days = ". json_encode($days) .";";
    @endphp
    var dataWeeklyChart = {
        labels: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
        series: [days]
    };
    var optionsWeeklyChart = {
        axisX: {
            showGrid: false
        },
        low: 0,
        // high: 1000,
        chartPadding: {
            top: 0,
            right: 5,
            bottom: 0,
            left: 0
        },
        axisY: {
            onlyInteger: true,
            offset: 20
        }
    };
    var responsiveOptions = [
    ['screen and (max-width: 640px)', {
        seriesBarDistance: 5,
        axisX: {
            labelInterpolationFnc: function (value) {
                return value[0];
            }
        }
    }]
    ];
    var WeeklyChart = Chartist.Bar('#WeeklyChart', dataWeeklyChart, optionsWeeklyChart, responsiveOptions);
    
    md.startAnimationForBarChart(WeeklyChart);
    
</script>