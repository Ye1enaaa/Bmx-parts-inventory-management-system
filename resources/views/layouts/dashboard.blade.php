<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
</head>
<body>

<div id="mySidebar" class="sidebar">
    <!-- Sidebar content -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

</div>

  <div class="main-liquor-data-show">
   
    @yield('content-liquor-data-show')

    <!-- @include('liquor-data.create') -->

  </div>

   <div class="main-liquor-data-create">
   
    @yield('content-liquor-data-create')

  </div>

  <div class="main-supplier">
   
    @yield('content-supplier')

  </div>


  <div class="main-purchase-order">
   
    @yield('content-purchase-order')

  </div>


  <script src="{{asset('js/admin-dashboard.js')}}"></script>

</body>
</html>
