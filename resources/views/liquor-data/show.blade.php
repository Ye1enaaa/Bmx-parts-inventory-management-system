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


  <body class="p-5 h-screen bg-gray-500">
    <h1 class="text-3xl font-bold mb-5 text-white"><b>List of Products</b></h1>

    <div class="pb-8 ">

      <a href="/create" class="bg-cyan-900 text-white font-bold py-2 px-4 rounded hover: cyan-700">New Post</a>

      </div>
    
        <div class="overflow-auto rounded-lg shadow hidden md:block">
          
              <table class="w-full whitespace-nowrap">
                

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



  </body>
</html>
