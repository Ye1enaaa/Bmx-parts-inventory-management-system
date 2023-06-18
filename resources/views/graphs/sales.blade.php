<!DOCTYPE html>
<html>
    <head>
        <title>Stock Out</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/admin-dashboard.css')}}">
        <script src="{{asset('js/supplier.js')}}"></script>
        <script src="{{asset('js/admin-dashboard.js')}}"></script>


        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>


        <style>
            .chart-container {
            width: 1000px;
            height: 500px;
            border: 3px solid #000;
            padding: 20px;
            font-weight: bold;
            }
        </style>
    </head>
    <body>

        <div class="bar">
        <ul class="">
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <div class="flex flex-wrap items-center justify-between w-full px-4 py-3 sm:flex-no-wrap">
                    <div class="flex items-center justify-center mr-6 text-white">
                        <span class="text-1xl font-bold sm:text-2xl">BMX: Dirt Jump Parts Inventory System</span>
                    </div>
                    <div class="flex items-center">
                        <div class="profile-container" style="padding: 1px; display: flex; align-items: center;">
                            <a class="flex items-center" id="profile-link">
                                <div class="w-10 h-10 rounded-full overflow-hidden">
                                    @if(Auth::user()->image)
                                    <img src="{{ env('HOST_URL') }}./storage/{{Auth::user()->image}}" class="w-full h-full object-cover" alt="Profile">
                                    @elseif(Auth::user()->image == null)
                                    <img src="{{ asset('assets/pictures/userasuser.png')}}" alt="">
                                    @endif
                                </div>
                                <span class="ml-2 name" style="color: #FFFFFF;">Admin</span>&nbsp;
                            </a>
                            <a class="hidden text-white sm:inline-block hover:text-gray-200" href="#" onclick="confirmLogout(event)">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
        </ul>
        </div>


        <div id="mySidebar" class="sidebar open">
            <div class="title">
                <a class="flex items-center ms-1">
                    <div class="w-12 h-12 rounded-full overflow-hidden">
                        @if(Auth::user()->image)
                        <img src="{{ env('HOST_URL') }}./storage/{{Auth::user()->image}}" class="w-full h-full object-cover" alt="Profile Picture">
                        @elseif(Auth::user()->image == null)
                        <img src="{{ asset('assets/pictures/userasuser.png')}}" alt="">
                        @endif
                    </div>
                    <div class="text-sm mt-3">
                        <div>{{ Auth::user()->name }}</div>
                        <div>{{ Auth::user()->email }}</div>
                    </div>
                </a>
            </div>
            <br><br>

            <a href="/dashboard" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center cursor-pointer">
                <span class="icon text-white">
                    <ion-icon name="file-tray-stacked"></ion-icon>
                </span>
                <span class="text-xl font-medium text-white">Dashboard</span>
            </a>
            <a href="#inventory" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center cursor-pointer" onclick="showProducts()">
                <span class="icon text-white">
                    <ion-icon name="pricetags-outline"></ion-icon>
                </span>
                <span class="text-xl font-medium text-white">Inventory</span>
            </a>
            <a href="/graphs" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center cursor-pointer tree-view-button" onclick="showSales()">
            <span class="icon text-white"><i class="fas fa-chart-bar"></i></span>
            <span class="text-xl font-medium text-white">Graphs</span>
            </a>
            <div x-data="{ open: false }" class="relative">
                <a href="#supplier" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center w-full cursor-pointer">
                    <button @click="open = !open">
                        <span class="icon">
                            <ion-icon name="person"></ion-icon>
                        </span>
                        <span class="text-xl font-medium">Supplier</span>
                    </button>
                </a>
            </div>
        </div>
        <br><br><br><br>

        <div class="flex justify-center ml-64">
            <div class="box bg-gray-200 p-1 w-full max-w-screen-xl">
                <button class="openbtn" onclick="openNav()">☰</button>
                <span id="dashboardText" class="dashboard-text font-bold text-base">Inventory System</span>
            </div>
        </div>
        <div id="salesGraphsContent" class="flex items-center justify-between w-full">
            <div>
                <h1 class="text-3xl font-bold mb-5 text-black ml-72">Stock Outs</h1>
            </div>
        </div>
        <div class="chart-container ml-96">
            <canvas id="myChart"></canvas>
        </div>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar', // Change the type to 'line'
                data: {
                    labels: [
                        @foreach ($stockOutsPerDay as $stockouts)
                            '{{ $stockouts->day }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Stock Out',
                        data: [
                            @foreach ($stockOutsPerDay as $stockouts)
                                {{ $stockouts->total }},
                            @endforeach
                        ],
                        backgroundColor: 'rgba(0, 68, 137, 1)', // Blue background color
                        borderColor: 'rgba(0, 68, 137, 1)',
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
        <script src="{{asset('js/create-user.js')}}"></script>
    </body>
</html>