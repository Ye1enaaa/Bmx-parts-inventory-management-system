<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{asset('css/admin-dashboard.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Fredoka">

    <title>Dashboard</title>
</head>
<body>
    <div class="contents">
        <div class="navigation">
            <div class="row">
            <div class="col-md-3">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="storefront-outline"></ion-icon></span>
                        <span class="title">Liquor Inventory Management</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/purchase">
                        <span class="icon"><ion-icon name="storefront-outline"></ion-icon></span>
                        <span class="title">Purchase</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="storefront-outline"></ion-icon></span>
                        <span class="title">Sales</span>
                    </a>
                </li>
                <li>
                    <a href="/index">
                        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                        <span class="title">Inventory</span>
                    </a>
                </li>

                <li>
                    <a href="/supplier">
                        <span class="icon"><ion-icon name="business-outline"></ion-icon></span>
                        <span class="title">Supplier</span>
                    </a>
                </li>
                <li>
                    <a href="/createuser">
                        <span class="icon"><ion-icon name="people-circle-outline"></ion-icon></span>
                        <span class="title">System Users</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    
    <!--Main-->


    <div class="product-field bg-cyan-600 hover:bg-cyan-500">
        <div class="icon"><ion-icon name="pricetags-outline"></ion-icon> </div>
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
        @yield('admin-table')
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>



</body>



</html>