<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=105">
    <title>Generate Barcode In Laravel</title>     


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>  
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Fredoka">
        <link rel="stylesheet" href="{{asset('css/admin-dashboard.css')}}">

   <!-- Fonts -->
   <!--<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">-->
   <!-- Bootstrap -->
   <!--<link rel="stylesheet" href="https://cdn.tailwindcss.com">-->
   <script src="https://cdn.tailwindcss.com"></script>
   <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->

  </head>


  <body class="body-overlay">

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

    
  
  <div class="bg-white rounded-lg shadow-md p-6">



   <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold mb-5 text-black">List of Products</h1>
          
   </div>
      

   <div class="mt-4">


      <a href="/create" class="inline-flex items-center justify-center py-2 px-4  text-white font-bold  bg-blue-700 hover:bg-blue-500 rounded-md">Add Products</a>
    
        <div class="overflow-auto rounded-lg shadow hidden md:block">

         <div class="mt-4">
          

              <table class="table-auto w-full">
                

                  <thead class="text-white bg-gray-900 border-gray-900 " >
                    
                    <tr class="text-center font bold">
                      <th class="px-4 py-2">Product Code</th>
                      <th class="px-4 py-2">Title</th>
                      <th class="px-4 py-2 ">Price</th>
                      <th class="px-4 py-2 ">Quantity</th>
                      <th class="px-4 py-2 ">inventory_value</th>

                      <th class="px-4 py-2 ">Qr Code</th>
                      <th class="px-4 py-2">Description</th>
                      
                    </tr>
                  </thead>


                  <tbody class="text-black text-center divide-y divide-blue-100">
                    
                    @foreach($product as $product)

                    <tr class="bg-blue-300 hover:underline ">

                        <td class="border px-6  py-4">{{$product->product_code}}</td>
                        <td class="border px-6  py-4">{{$product->name}}</td>
                        <td class="border px-6  py-4">{{$product->unit_price}}</td>
                        <td class="border px-6  py-4">{{$product->quantity}}</td>
                        <td class="border px-6  py-4">{{$product->inventory_value}}</td>                  
                        <td class="border px-6  py-4"><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$product->product_code}}"> </td>
                        <td class="border px-6  py-4">{{$product->description}}</td>

                    
                        
                    </tr>
                    @endforeach
                   

                  </tbody>
                  </div>    
                </table>   
                
        
        <div class="grid grid-cols1 gap-4 md:hidden">
          <div class="bg-white space-y-4 p-4 rounded-lg shadow">
          <div class=flex items-center space-x-2 text-sm>
            <div>
              <div>
                <a href="#"class="text-blue-500 font-bold hover:underline">{{$product->id}}</a>
              </div>

              <div class="text-gray-500">{{$product->name}}</div>
              
              <div class="text-gray-500">{{$product->unit_price}}</div>
               
              <div class="text-gray-500">img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$product->product_code}}</div>
           

              <div classtext-sm text-gray-700="">{{$product->description}}</div>
            </div>

          </div>
          </div>


        </div>

      </div>

    </div>

  </div>

  </body>


</html>