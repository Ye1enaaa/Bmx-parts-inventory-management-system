<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.css" integrity="sha384-ZJ1Cfwfg1dGmMCmK/eRGLUbDmQRlNt+WSlaLn9pBwxG/irnTfTnfnE1+mxNlJr8y" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js" integrity="sha384-7/ln1Y5J5B5+Rr8jJW5m29F5p5BYjg3rh8HQweDKcuxkIit95B+9lxQjRzNZZNfO" crossorigin="anonymous"></script>

  <title>Dashboard</title>
</head>

<body>

<div id="mySidebar" class="sidebar">
    <!-- Sidebar content -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

</div>

  <div class="main-sales-graphs">
    
    @yield('content-sales-graphs')

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

    <div class="main-supplier-information">
   
    @yield('content-supplier-information')

  </div>


  <div class="main-supplier-add">
   
    @yield('content-supplier-add')

  </div>
 





  <div class="container">
        @yield('content')
    </div>


  <!-- <div class="main-purchase-order">
   
    @yield('content-purchase-order')

  </div> -->


  

  <script src="{{asset('js/admin-dashboard.js')}}"></script>
 
</body>
</html>
