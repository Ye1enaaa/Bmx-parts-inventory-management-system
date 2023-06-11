<!DOCTYPE html>
<html lang="en" dir="ltr">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="{{asset('js/admin-dashboard.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="{{asset('css/admin-dashboard.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>

    <script src="{{asset('js/admin-dashboard.js')}}"></script>
    <script src="{{asset('js/supplier.js')}}"></script>


    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.css" type="text/css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Fredoka">
    
     <script src="js/script.js" defer></script>


    <title>Dashboard</title>

</head>

<body class="flex h-screen">

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
          <i class="icon mr-2"><ion-icon name="file-tray-stacked"></ion-icon></i>
          <span class="text-xl font-medium">Dashboard</span>
        </a>


        <a class="py-2 px-4 text-white hover:bg-blue-400 flex items-center cursor-pointer" onclick="showProducts()">
          <i class="icon"><ion-icon name="pricetags-outline"></ion-icon></i>
          <span class="text-xl font-medium">Inventory</span>
        </a>


      <div x-data="{ open: false }" class="relative">
        
      <a href="#" class="py-2 px-4 text-white hover:bg-blue-400 flex items-center w-full cursor-pointer">
        <button @click="open = !open" >
          <i class="icon"><ion-icon name="person"></ion-icon></i>
          <span class="text-xl font-medium">Supplier</span>
        </button>
      </a> 

        <div x-show="open" @click.away="open = false" class="dropdown-menu absolute right-0 mt-2 py-2 w-full bg-[#072e33] rounded-md shadow-lg">
          
          <a class="dropdown-item block px-4 py-2 text-white hover:bg-blue-400 text-xs" href="#" onclick="showSupplierInformation()">
            Supplier Information
          </a>
          <br>
          <a class="dropdown-item block px-4 py-2 text-white hover:bg-blue-400 text-xs" href="#" onclick="showAddSupplier()">
            Add Supplier
          </a>
        </div>
    </div>

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

      <div class="dashboard">
        <div class="box bg-gray-200 p-1 w-full">
          <button class="openbtn" onclick="openNav()">☰</button>
          <span id="dashboardText" class="dashboard-text font-bold text-base">Inventory System</span>
        </div>
      </div>
          
        </div>   
        <!-- Main Content -->
        <main class="main-content1">
          <br>

          <div>
            @yield('content-dashboard')  
          </div>


        </main>

          
    </div>

  </div>
  
    
  @if (session()->has('alert'))
    <script src="{{ asset('js/stock-alert.js') }}"></script>
    <script>
        showAlert('{{ session('alert') }}');
        console.log('Hi');
    </script>
  @endif
 
  <script>
    fetch('{{ env('HOST_URL')}}./api/understocklvl')
    .then(response => response.json())
    .then(data => {
      if (data.understock && data.understock.length > 0) {
        var confirmation = window.confirm('Alert!! Low Stock Level, Please supply immediately!!');
        if (confirmation) {
          window.open('/index/understocks', '_blank');
          //window.location.href = '/index/understocks';
        } else {
          
        }
      }
    })
    .catch(error => console.error('Error:', error));
  </script>


</body>
</html>


