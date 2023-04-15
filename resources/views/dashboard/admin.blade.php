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
</head>

<body class="wrapper">

<div class="body-overlay">

    <input type="checkbox" id="check">

    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>

    <div class="sidebar">
        <header>Liquor Inventory Management</header>

        <br></br>


        <a href="/dashboard" class="active">
            <i class="icon"><ion-icon name="stats-chart-outline"></ion-icon></i>
            <span>Dashboard</span>
        </a>


        <a href="/purchase">
            <i class="icon"><ion-icon name="storefront-outline"></i>
            <span>Purchase</span>
        </a>



        <a href="#">
            <i class="icon"><ion-icon name="stats-chart-sharp"></i>
            <span>Sales</span>
        </a>



        <a href="/index">
            <i class="icon"><ion-icon name="pricetags-outline"></i>
            <span>Products</span>
        </a>



        <a href="/supplier">
            <i class="icon"><ion-icon name="business-outline"></i>
            <span>Supplier</span>
        </a>



        <a href="/createuser">
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
</div>



 <div class="bar bg-blue-500">
        @yield('top-bar')  
    </div>

    <div class="product-field bg-cyan-600 hover:bg-cyan-500">
        <div class="icon"><ion-icon name="pricetags-sharp"></ion-icon> </div>
        @yield('content')
        
    </div>
    

    <div class="total-quantity bg-green-600 hover:bg-green-500 ">
        <div class="icon"><ion-icon name="wine"></ion-icon> </div>
        @yield('total-quantity')

    </div>


    <div class="total-inventory-value bg-red-600 hover:bg-red-500">
        <div class="icon"><ion-icon name="trending-up-sharp"></ion-icon> </div>
        @yield('total-inventory-value')
    </div>



    <div class="total-admin bg-orange-500 hover:bg-orange-400">
        <div class="icon"><ion-icon name="people-circle-outline"></ion-icon> </div>
        @yield('customer-table')
    </div>

    <div class="sales bg-violet-500 hover:bg-violet-400">
        <div class="icon"><ion-icon name="stats-chart-sharp"></ion-icon> </div>
        @yield('total-sales')
    </div>



</body>


</html>