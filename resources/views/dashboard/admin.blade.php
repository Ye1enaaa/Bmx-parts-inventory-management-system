<!DOCTYPE html>
<html lang="en" dir="ltr">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="{{asset('css/admin-dashboard.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>

    <script src="{{asset('js/admin-dashboard.js')}}"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.css" type="text/css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Fredoka">
    
     <script src="js/script.js" defer></script>
     <!-- <script src="js/script.js"></script> -->


    <title>Dashboard</title>

</head>


<body class="flex h-screen">
  <!-- Sidebar -->
 <div id="mySidebar" class="sidebar open">
    <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a> -->

    <div class="title">
        <a class="d-flex align-items-center ms-1">
            <ion-icon name="person-circle" class="text-white" style="font-size: 4rem;"></ion-icon>


          <div class=" text-sm mt-3">
            <div>{{ Auth::user()->name }}</div>
            <div>{{ Auth::user()->email }}</div>
          </div>
        </a>
    </div>

        <br>

  
        <a href="/dashboard" class="py-2 px-4 text-white hover:bg-blue-100 flex items-center">
          <i class="icon mr-2"><ion-icon name="file-tray-stacked"></ion-icon></i>
          <span>Dashboard</span>
        </a>


        <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center" onclick="showPurchase()">
            <i class="icon"><ion-icon name="bicycle-outline"></ion-icon></i>
            <span>Purchase</span>
        </a>

        <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center" onclick="showSales()">
            <i class="icon"><ion-icon name="stats-chart-sharp"></ion-icon></i>
            <span>Sales</span>
        </a>


        <a class="py-2 px-4 text-white hover:bg-blue-400 flex items-center" onclick="showProducts()">
            <i class="icon"><ion-icon name="pricetags-outline"></ion-icon></i>
            <span>Products</span>
        </a>

        <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center" onclick="showSuppliers()">
            <i class="icon"><ion-icon name="person"></ion-icon></i>
            <span>Supplier</span>
        </a>

  </div>

  <!-- Main Content -->
  <div class="flex flex-col flex-1 main-content open">
    <!-- Top Bar -->
        <div>
          @yield('top-bar')  
        </div>

        <!-- Hamburger Menu -->

        <br> <br> <br> 


    <div id="main">

      <button class="openbtn" onclick="openNav()">☰ </button>      
        <!-- Main Content -->
        <main class="main-content1">
          <br>

          <div>
            @yield('content-dashboard')  
          </div>


        </main>

          
    </div>

  </div>

  <script src="{{asset('js/admin-dashboard.js')}}"></script>

</body>
</html>
