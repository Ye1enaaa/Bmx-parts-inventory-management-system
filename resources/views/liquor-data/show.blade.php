@extends('layouts.dashboard')

@section('content-liquor-data-show')



<div class="main-liquor-data-show">
  @php
    $outOfStock = $product->contains('quantity', '<=', 10) || $product->contains('quantity', 0);
  @endphp

  <div class="flex items-center justify-between">
    <h1 class="text-4xl font-bold mb-5 text-black ml-6">List of Inventory</h1>
  </div>

  @if ($outOfStock)
    <div class="flex items-center justify-between">
      <p class="text-red-500 text-2xl font-bold mb-2 mx-6">
        @if ($product->contains('quantity', 0))
          Out of Stock! Please supply as soon as Possible!!
        @else
          Alert!! Low Stock Level, Please supply immediately!!
        @endif
      </p>
    </div>
  @endif
      
    <div class="mt-4">
      
  <div class="flex justify-end px-4">
    <button id="show-popup-btn" class="btn btn-primary items-center justify-center py-2 px-6 text-white font-bold bg-blue-500 hover:bg-blue-400 rounded-md" onclick="showPopupForm()">Add Product</button>
  </div>
  

      <div class="overflow-auto rounded-lg shadow-2xl hidden md:block ">
        <div class="mt-4">

          <div style="position: relative;">

            <div class="table-container px-4">
              <table class="w-full border shadow">  
                  <thead class="text-white bg-gray-900 border-gray-900">
                    <tr class="text-center font-bold">
                      <th class="px-4 py-2">Product Code</th>
                      <th class="px-4 py-2">Product Name</th>
                      <th class="px-4 py-2">Stock on Hand</th>
                      <th class="px-4 py-2">Price</th>
                      <!-- <th class="px-4 py-2">Description</th> -->
                      <th class="px-4 py-2">Amount</th>
                      <th class="px-4 py-2">QR Code</th>
                      <th class="px-4 py-2">Supplier</th>
                      <th class="px-4 py-2">Edit</th>
                      <th class="px-4 py-2">Stock Card</th>
                      
                    </tr>
                  </thead>
                  <tbody class="text-black text-center divide-y divide-blue-300">
                    @foreach($product as $product)
                    
                    <tr class="hover:underline ">
                      <td class="border px-6 py-4">{{$product->product_code}}</td>
                      <td class="border px-6 py-4">{{$product->name}}</td>
                    
                      <td id="checkValueData" class="border px-6 py-4 {{$product->quantity <= 10 ? 'bg-red-500' : ''}}">{{$product->quantity}}</td>
                      <td class="border px-6 py-4">{{$product->unit_price}}</td>
                      <!-- <td class="border px-6 py-4">{{$product->description}}</td> -->
                      <td class="border px-6 py-4">{{$product->inventory_value}}</td>     
                      <td class="border px-6 py-4"><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$product->product_code}}"> </td>
                      <td class="border px-6 py-4">{{$product->supplier->name}}</td>
                      <td class="border px-6 py-4">
                          <a href="#" class="text-blue-600 hover:underline" onclick="showEditForm(event)">Edit</a>
                      </td>
                      <td class="border px-6 py-4">
                        <a href="#stockcard" onclick="showstockcard({{$product->id}})">
                          <span class="text-green-900">show</span>
                        </a>
                      </td>


                    </tr>
                    @endforeach
                  </tbody>
              </table>   
            </div>
          </div>

            <div style="position: fixed; bottom: 0; left: 50%; transform: translateX(-50%);" class="w-screen">
              <div class="box bg-custom-color p-1 ml-6 mr-6">

              
              <div class="flex items-center justify-end">
              <div class="mr-96 py-2 px-6 text-black text-xl font-bold h-full">Total stock on hand: {{$totalstocks}}</div>

              <a href="#understock" onclick="showUnderstock()" class="btn btn-primary items-center justify-center py-1 px-6 text-xl text-white font-bold bg-black hover:bg-blue-400 rounded-md">
                <span class="text-sm font-medium text-white">Understock</span>
              </a>

              <a href="{{ route('inventory.print') }}" class="rounded-lg mr-8 justify-center py-1 px-6 text-xl font-bold bg-black hover:bg-blue-400" download style="margin-left: 20px;">
                <span class="text-sm font-medium text-white">Download Inventory</span>
              </a>





            </div>

  </div>
</div>

   
          
        

      </div>


        <div class="px-10 mx-auto p-11 rounded-2xl shadow-md hidden" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); border: 1px solid black; padding: 10px; display: none; background-color: white; width: 50%; border-radius: 10px; box-shadow: 0 4px 6px -1px black; background-color: white;"
         id="edit-form">
              
              <form id="product-form" method="POST" action="{{route('products.edit', $product->id)}}">
                  @csrf
                  @method('PUT')

                  <div class="bg-white">
                      <h1 class="justify-center flex text-4xl font-bold mb-5 text-black"><b>Edit Products</b></h1>
                      <label for="name">Product Name:</label>
                      <input type="text" name="name" value="{{ $product->name }}" required><br>
                      <label for="unit_price">Price:</label>
                      <input type="number" name="unit_price" value="{{ $product->unit_price }}" required><br>
                      <label for="quantity">Quantity:</label>
                      <input type="number" name="quantity" value="{{ $product->quantity }}" required><br>
                      <!-- <label for="description">Description:</label>
                      <textarea name="description" required>{{ $product->description }}</textarea><br> -->

                      <div class="flex justify-center items-center">
                        <button type="submit" style="background-color: black; color: white; padding: 10px 20px; margin-right: 20px; border: none; border-radius: 5px;">Update</button>
                        <button type="button" onclick="hideEditForm()" style="background-color: black; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Cancel</button>

                      </div>
                      
                  </div>

              </form>
          </div>


        </div>


        
      <!-- </div> -->


       <div id="popup-form" class="px-10 mx-auto p-11 rounded-2xl shadow-md hidden" style="box-shadow: 0 4px 6px -1px black; background-color: white;">

            <form action="{{route('post')}}" method="post"> <br>
              @csrf
              <h1 class="justify-center flex text-4xl font-bold mb-5 text-black"><b>Add Products</b></h1>
              <br>

            <select name="supplier_id" class="font-bold w-full mb-4 p-3 flex items-center border border-gray-400 bg-gray-200">
              <option value="" disabled selected>Supplier name</option>
              @foreach($supplier as $supplier)
                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
              @endforeach
            </select>


              <div class="flex flex-wrap space-x-10">
                <div class="w-full mb-4 flex items-center">
                  <label for="Name" class="block w-20 mr-2 font-bold dark:text-white">Product Name:</label>
                  <input class="border border-black block py-2 px-4 w-full rounded focus:outline-none focus:border-blue-500"
                    type="text" 
                    name="name" required>
                </div>
              </div>

              <div class="w-full mb-4 flex items-center">
                  <label for="Price" class="block w-20 mr-2 font-bold dark:text-white">Price:</label>
                  <div class="flex">
                    <div class="flex items-center px-4 bg-blue-800 text-white rounded-l">
                      PHP
                    </div>
                    <input 
                      placeholder="1"
                      class="border border-black block py-2 px-4 w-full rounded-l-none rounded-r focus:outline-none focus:border-blue-500" 
                      type="number" 
                      min="0"
                      name="unit_price" required>
                    <div class="flex items-center px-4">
                      <label for="Quantity" class="block w-20 mr-2 font-bold dark:text-white">Quantity:</label>
                    </div>
                    <input 
                      placeholder="minimum of 20"
                      class="border border-black block py-2 px-4 w-full rounded-l-none rounded-r focus:outline-none focus:border-blue-500" 
                      type="number" 
                      min="0"
                      name="quantity" required>
                  </div>
                </div>
                <br><br>

             <div class="flex justify-center space-x-4">
              <button type="submit" class="btn btn-success col-md-3 text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-2">Save</button>
              <button type="button" class="text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="hidePopupForm()">Cancel</button>
            </div>


            
            </form>
        </div>
      </div>

      
  </div>

     <script src="{{asset('js/admin-dashboard.js')}}"></script>




@endsection




