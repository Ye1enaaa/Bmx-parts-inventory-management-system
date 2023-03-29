<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Generate Barcode In Laravel</title>       
   <!-- Fonts -->
   <!--<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">-->
   <!-- Bootstrap -->
   <!--<link rel="stylesheet" href="https://cdn.tailwindcss.com">-->
   <script src="https://cdn.tailwindcss.com"></script>
   <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
</head>
  <body>



    <div class="container mx-auto">
      <div class="my-10">
        
        <h1 class="text-3xl font-bold text-center mb-5"><b>List of Products</b></h1>
        <hr class="border-b-2 border-gray-300 mb-10">
        <div class="flex justify-center mb-10">
          <a href="/create" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">New Post</a>

        </div>
              <table class="table-auto border-collapse border border-gray-500">
                  <thead>
                    <tr>
                      <th scope="col" class="px-4 py-2 border border-gray-500">ID</th>
                      <th scope="col" class="px-4 py-2 border border-gray-500">Title</th>
                      <th scope="col" class="px-4 py-2 border border-gray-500">Price</th>
                      <th scope="col" class="px-4 py-2 border border-gray-500">Qr Code</th>
                      <th scope="col" class="px-4 py-2 border border-gray-500">Description</th>
                    </tr>
                  </thead>
                  <tbody>

                    
                    @foreach($product as $product)
                    <tr>
                        <th class="px-4 py-2 border border-gray-500">{{$product->id}}</th>
                        <td class="px-4 py-2 border border-gray-500">{{$product->name}}</td>
                        <td class="px-4 py-2 border border-gray-500">{{$product->unit_price}}</td>
                        <td class="px-4 py-2 border border-gray-500"><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$product->product_code}}">
                        </td>
                        <td class="px-4 py-2 border border-gray-500">{{$product->description}}</td>
                    </tr>
                    @endforeach
                   

                  </tbody>
                </table>       
        </div>
      </div>
    </div>



  </body>
</html>
