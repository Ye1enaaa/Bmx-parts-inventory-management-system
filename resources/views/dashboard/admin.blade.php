<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/admin-dashboard.css')}}">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Fredoka">
    <title>Dashboard</title>
</head>
<body>
    <div class="contents">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="storefront-outline"></ion-icon></span>
                        <span class="title">Liquor Inventory</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/index">
                        <span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span>
                        <span class="title">Product</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
    <div class="product-field">
        @yield('content')
    </div>

    <div class="total-quantity">
        @yield('total-quantity')
    </div>

    <div class="total-inventory-value">
        @yield('total-inventory-value')
    </div>

    <div class="total-admin"><!--same class name as the child class-->
        @yield('admin-table')
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>