

@extends('customer.customer')

@section('add-form')



<div class="add-form">
    <form action="/post-customer" method="post" id="add-form" class="px-4">
    <!--<form method="post" id="add-form">-->
        @csrf

        
        <h1 class="flex text-2xl font-bold mb-10 text-black"><b>Order Products</b></h1>


        <div class= "w-5/12 bg-blue-400 px-10 space-y-5 p-11 rounded-md">

            

                <label for="Select Data" class="block mb-2 text-lg font-bold dark:text-white">Select Data:</label>

                    <select name="name_value" id="name_value" class="border border-gray-400 block py-2 px-4 w-6/12 rounded focus:outline-none focus:border-blue-500" >

                        @foreach($names as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach

                    </select>
            
                    
                <label for="Quantity" class="block mb-2 text-lg font-bold dark:text-white">Quantity:</label>
                    <input class="border border-gray-400 block py-2 px-4 w-6/12 rounded focus:outline-none focus:border-blue-500"
                        type="number" 
                        name="quantity" 
                        id="quantity">


                    <div id="price"></div>
                    <div id="total" name="total_value"></div>



            <button type="submit" class="font-medium h-14 w-1/5 text-white bg-gray-900 hover:bg-blue-700 rounded-lg dark:bg-blue-600"
                
                    id="submit">Place Order </button>


        </div>

    </form>

<div class="mt-4">

</div>
@endsection



@section('my-orders')


<div class="my-orders">

    <h1 class="p-8 text-center flex text-2xl font-bold mb-10 text-black"><b>My Order</b></h1>

    <table class="table-auto w-9/12" style="border:1px solid black;margin-left:auto;margin-right:auto;">

        <thead class="text-white bg-blue-900 border-blue-900 " >
                    
                    <tr class="text-center font bold">
                      <th class="px-3 py-2">Order Date</th>
                      <th class="px-3 py-2">Name</th>
                      <th class="px-3 py-2 ">Quantity</th>

                    </tr>
                  </thead>

    <tbody class="text-black text-center divide-y divide-blue-100">

        @foreach($orders as $order)

        <tr class="bg-white hover:underline ">

                        <td class="border px-1  py-2">{{ $order->created_at }}</td>
                        <td class="border px-1  py-2">{{$order->name}}</td>
                        <td class="border px-1  py-2">{{$order->quantity}} pcs.</td>
                 
                    </tr>


    @endforeach

    </tbody>
</div>
@endsection

