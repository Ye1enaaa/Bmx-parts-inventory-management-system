@extends('layouts.dashboard')


@section('content-liquor-data-show')

  <div class="main-liquor-data-show">

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



@endsection


