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
  
  <header>Liquor Inventory Management</header>

        <br></br>
    <a href="/dashboard" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center">
        <i class="icon mr-2"><ion-icon name="stats-chart-outline"></ion-icon></i>
        <span>Dashboard</span>
    </a>


    <a href="/purchase" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center">
        <i class="icon mr-2"><ion-icon name="storefront-outline"></ion-icon></i>
            <span>Purchase</span>
    </a>


    <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center">
        <i class="icon"><ion-icon name="stats-chart-sharp"></i>
            <span>Sales</span>
    </a>


    <a href="/index" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center">
        <i class="icon"><ion-icon name="pricetags-outline"></i>
            <span>Products</span>
    </a>


    <a href="/index" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center">
        <i class="icon"><ion-icon name="business-outline"></i>
            <span>Supplier</span>
    </a>



    <a href="/index" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center">
        <i class="icon"><ion-icon name="settings-outline"></i>
            <span>System Users</span>
    </a>

        <div class="icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-github"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>

        </div>

  </div>

  <!-- Main Content -->
  <div class="flex flex-col flex-1">
    <!-- Top Bar -->
        <div>
          @yield('top-bar')  
        </div>

        <!-- Hamburger Menu -->
    <div id="main">
      <button class="openbtn" onclick="openNav()">☰ Liquor Inventory Management</button>      
        <!-- Main Content -->
        <main class="flex-1 p-4">
          

<div class="flex flex-wrap sm:flex-nowrap justify-center">

  <div class="total-quantity bg-orange-600 hover:bg-orange-500 rounded-lg w-80 font-serif text-2xl text-center p-10 m-4">
    <div class="icon text-white mb-2" style="float: right;">
      <ion-icon name="wine" class="text-6xl"></ion-icon>
    </div>
    @yield('total-quantity')
  </div>

  <div class="total-inventory-value bg-cyan-600 hover:bg-cyan-500 rounded-lg w-80 font-serif text-2xl text-center p-10 m-4">
    <div class="icon text-white mb-2" style="float: right;">
      <ion-icon name="trending-up-sharp" class="text-6xl"></ion-icon>
    </div>
    @yield('total-inventory-value')
  </div>

  <div class="total-admin bg-orange-500 hover:bg-orange-400 rounded-lg w-80 font-serif text-2xl text-center p-10 m-4">
    <div class="icon text-white mb-2" style="float: right;">
      <ion-icon name="people-circle-outline" class="text-6xl"></ion-icon>
    </div>
    @yield('customer-table')
  </div>
</div>


<div class="flex flex-wrap sm:flex-nowrap justify-center">


  <div class="sales bg-cyan-500 hover:bg-cyan-400 rounded-lg w-80 font-serif text-2xl text-center p-10 m-4">
    <div class="icon text-white mb-2" style="float: right;">
      <ion-icon name="stats-chart-sharp" class="text-6xl"></ion-icon>
    </div>
    @yield('total-sales')
  </div>



  <div class="product-field bg-orange-600 hover:bg-orange-500 rounded-lg w-80 font-serif text-2xl text-center p-10 m-4">
    <div class="icon text-white mb-2" style="float: right;">
      <ion-icon name="pricetags-sharp" class="text-6xl"></ion-icon>
    </div>
    @yield('product-field')        
  </div>

</div>
        
       





  
  
  
  </main>
  </div>





  <script>
    function openNav() {
      document.getElementById("mySidebar").classList.add("w-64");
      document.getElementById("mySidebar").classList.remove("w-0");
      document.getElementById("main").classList.add("ml-64");
    }

    function closeNav() {
      document.getElementById("mySidebar").classList.remove("w-64");
      document.getElementById("mySidebar").classList.add("w-0");
      document.getElementById("main").classList.remove("ml-64");
    }
  </script>
</body
