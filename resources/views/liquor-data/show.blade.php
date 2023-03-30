<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <a href="/create" class="bg-cyan-900 text-white font-bold py-2 px-4 rounded hover:bg-cyan-700">New Post</a>
    
      <div class="pb-8 ">
        
   
        </div class="flex justify-center items-center h-screen ">
              <table class="shadow-2xl font-[Poppins] border-2 border-gray-900 w-full">
                

                  <thead class="text-white bg-gray-900 border-gray-900 " >
                    
                    <tr>
                      <th scope="col" class="py-3 ">ID</th>
                      <th scope="col" class="py-3 ">Title</th>
                      <th scope="col" class="py-3 ">Price</th>
                      <th scope="col" class="py-3 ">Qr Code</th>
                      <th scope="col" class="py-3 ">Description</th>
                    </tr>
                  </thead>


                  <tbody class="text-black text-center">
                    
                    @foreach($product as $product)
                    <tr class="bg-cyan-200 hover:bg-cyan-600 hover:scale-105 cursor-pointer duration-300">

                        <td class="py-1 px-5 border ">{{$product->id}}</td>
                        <td class="py-1 px-5 border ">{{$product->name}}</td>
                        <td class="py-1 px-5 border ">{{$product->unit_price}}</td>
                        <td class="py-1 px-5 border "><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$product->product_code}}"> </td>
                        <td class="py-1 px-5 border ">{{$product->description}}</td>
                    </tr>
                    @endforeach
                   

                  </tbody>
                  </div>    
                </table>   
                 
        </div>
        </div>
   



  </body>
</html>
