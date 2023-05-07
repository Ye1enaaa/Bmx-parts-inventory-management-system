@extends('layouts.dashboard')

@section('content-sales-graphs')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.css" type="text/css">


<div id="mySidebar" class="sidebar">
    <!-- Sidebar content -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
</div>

<div class="main-sales-graphs">
    <div class="flex items-center justify-between">
        <h1 class="text-3xl font-bold mb-5 text-black">Sales Graphs</h1>
    </div>
    <canvas id="myChart"></canvas>
    
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
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
</div>

<script src="{{asset('js/admin-dashboard.js')}}"></script>

@endsection
