@extends('layouts.dashboard')

@section('content-liquor-data-show')

  <div class="main-liquor-data-show">
    <div class="flex items-center justify-between">
      <h1 class="text-3xl font-bold mb-5 text-black">List of Products</h1>
    </div>
      
    <div class="mt-4">
      
      <button id="show-popup-btn" class="btn btn-primary items-center justify-center py-2 px-4  text-white font-bold  bg-blue-700 hover:bg-blue-500 rounded-md" onclick="showPopupForm()">Add Product</button>


      <div class="overflow-auto rounded-lg shadow hidden md:block">
        <div class="mt-4">
          <table class="table-auto w-full">
            <thead class="text-white bg-gray-900 border-gray-900">
              <tr class="text-center font-bold">
                <th class="px-4 py-2">Product Code</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">inventory_value</th>
                <th class="px-4 py-2">Qr Code</th>
                <th class="px-4 py-2">Description</th>
              </tr>
            </thead>
            <tbody class="text-black text-center divide-y divide-blue-100">
              @foreach($product as $product)
              <tr class="bg-blue-300 hover:underline ">
                <td class="border px-6 py-4">{{$product->product_code}}</td>
                <td class="border px-6 py-4">{{$product->name}}</td>
                <td class="border px-6 py-4">{{$product->unit_price}}</td>
                <td class="border px-6 py-4">{{$product->quantity}}</td>
                <td class="border px-6 py-4">{{$product->inventory_value}}</td>                  
                <td class="border px-6 py-4"><img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$product->product_code}}"> </td>
                <td class="border px-6 py-4">{{$product->description}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>   
        </div>
      </div>

        <div id="popup-form" class="bg-gray-100 px-10 mx-auto p-11 rounded-md hidden">
          <form action="{{route('post')}}" method="post"> <br>
            @csrf
            <h1 class="justify-center flex text-3xl font-bold mb-5 text-black"><b>Add Products</b></h1>
            <br>
            
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
                    placeholder="1"
                    class="border border-black block py-2 px-4 w-full rounded-l-none rounded-r focus:outline-none focus:border-blue-500" 
                    type="number" 
                    min="0"
                    name="quantity" required>
                </div>
              </div>


              <div class="w-full mb-4">
                <label for="Description" class="block mb-2 text-lg dark:text-white">Description:</label>
                <textarea 
                  name="description" 
                  class="form-control mb-3 bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:border-blue-500 block py-3 px-20" 
                  cols="70" rows="7" required>
                </textarea>
              </div>
            

            <div class="flex justify-center">
              <button type="submit" class="btn btn-success col-md-3 text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-2">Save</button>
              <button type="button" class="text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="hidePopupForm()">Cancel</button>
            </div>

            

          </form>
        </div>

      
  </div>

     <script src="{{asset('js/admin-dashboard.js')}}"></script>


@endsection


