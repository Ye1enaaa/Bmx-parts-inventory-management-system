<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  <script src="{{asset('js/admin-dashboard.js')}}"></script>


  <title>Dashboard</title>

  <head>
  <style>
      .custom-margin {
    margin-right: 150px;
}



  </style>

</head>

</head>

<body>

  <div class="main-liquor-data-show">
   
    @yield('content-liquor-data-show')

  </div>


    <div class="supplierInformation">
   
    @yield('content-supplier-information')

  </div>


  <div class="addSupplier">
   
    @yield('content-supplier-add')

  </div>


 
<!-- 
  <div class="container">
        @yield('content')
    </div> -->



  <!-- <div class="main-supplier">
   
    @yield('content-supplier')

  </div> -->

    <!-- <div class="main-sales-graphs">
    
    @yield('content-sales-graphs')

  </div> -->

 
</body>
</html>
