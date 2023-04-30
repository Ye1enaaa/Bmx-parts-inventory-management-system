<!DOCTYPE html>
<html lang="en" dir="ltr">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="{{asset('css/admin-dashboard.css')}}">

    <script src="{{asset('js/admin-dashboard.js')}}"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Fredoka">

    <title>Dashboard</title>

</style>
</head>
<body class="flex h-screen">
  <!-- Sidebar -->
 <div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

    <div class="title">
        <a class="d-flex align-items-center ms-1">
          <span class="fa-stack">
            <i class="fas fa-circle fa-stack-2x text-white"></i>
            <i class="fas fa-user fa-stack-1x fa-inverse text-black"></i>
          </span>

          <div class=" text-sm mt-3">
            <div>{{ Auth::user()->name }}</div>
            <div>{{ Auth::user()->email }}</div>
          </div>
        </a>
      </div>

        <br>

  
        <a href="/dashboard" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center">
          <i class="icon mr-2"><ion-icon name="stats-chart-outline"></ion-icon></i>
          <span>Dashboard</span>
        </a>


        <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center" onclick="showPurchase()">
            <i class="icon"><ion-icon name="storefront-outline"></ion-icon></i>
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
            <i class="icon"><ion-icon name="business-outline"></ion-icon></i>
            <span>Supplier</span>
        </a>

        <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center" onclick="showCustomers()">
            <i class="icon"><ion-icon name="settings-outline"></ion-icon></i>
            <span>Customers</span>
        </a>


    <br></br>
            <div class="icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>

            </div>

  </div>

  <!-- Main Content -->
  <div class="flex flex-col flex-1 main-content">
    <!-- Top Bar -->
        <div>
          @yield('top-bar')  
        </div>

        <!-- Hamburger Menu -->
    <div id="main">

      <button class="openbtn" onclick="openNav()">☰ </button>      
        <!-- Main Content -->
        <main class="main-content1">

          <div>
            @yield('content-dashboard')  
          </div>

      

          
        </main>
    </div>

  </div>

  <script src="{{asset('js/admin-dashboard.js')}}"></script>

</body