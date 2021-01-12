<script>
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

