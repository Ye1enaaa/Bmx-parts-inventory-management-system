<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=105">
    <title>Generate Barcode In Laravel</title>       
   <!-- Fonts -->
   <!--<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">-->
   <!-- Bootstrap -->
   <!--<link rel="stylesheet" href="https://cdn.tailwindcss.com">-->
   <script src="https://cdn.tailwindcss.com"></script>
   <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->

  </head>


  <body class="bg-white rounded-lg shadow-md p-6">


   <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold mb-5 text-black">List of Products</h1>
          
   </div>
      

   <div class="mt-4">


      <a href="/create" class="inline-flex items-center justify-center py-2 px-4  text-white font-bold  bg-green-700 hover:bg-green-500 rounded-md">Add Products</a>
    
        <div class="overflow-auto rounded-lg shadow hidden md:block">

         <div class="mt-4">
          

              <table class="table-auto w-full">
                

                  <thead class="text-white bg-gray-900 border-gray-900 " >
                    
                    <tr class="text-center font bold">
                      <th class="border px-10  py-5 ">Product Code</th>
                      <th class="border px-6  py-4 ">Title</th>
                      <th class="border px-10  py-5 ">Price</th>
                      <th class="border px-10  py-5 ">Quantity</th>
                      <th class="border px-10  py-5 ">Inventory Value</th>
                      <th class="border px-6  py-4 ">Qr Code</th>
                      <th class="border px-6  py-4 ">Description</th>
                    </tr>
                  </thead>


                  <tbody class="text-black text-center divide-y divide-gray-100">
                    
                    @foreach($product as $product)

                    <tr class="bg-gray-200 hover:underline ">

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
                
        

      </div>

    </div>


   



  </body>



</html>