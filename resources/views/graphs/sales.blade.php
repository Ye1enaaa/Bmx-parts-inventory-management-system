<!DOCTYPE html>
<html>
<head>
    <title>Sales Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('js/admin-dashboard.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

    
    <style>
        .chart-container {
            width: 400px;
            height: 300px;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>



<div id="salesGraphsContent" class="flex items-center justify-between w-full">
    <div>
        <h1 class="text-3xl font-bold mb-5 text-black ml-8">Sales Graphs</h1>
    </div>
</div>

<div class="chart-container ml-8">
    <canvas id="myChart"></canvas>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Change the type to 'line'
        data: {
            labels: [
                @foreach ($salesByDay as $sale)
                    '{{ $sale->day }}',
                @endforeach
            ],
            datasets: [{
                label: 'Sales',
                data: [
                    @foreach ($salesByDay as $sale)
                        {{ $sale->total }},
                    @endforeach
                ],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'day',
                        displayFormats: {
                            day: 'MMM D'
                        }
                    }
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script src="{{asset('js/admin-dashboard.js')}}"></script>


</body>
</html>
