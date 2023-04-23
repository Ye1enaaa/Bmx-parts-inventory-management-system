

@extends('customer.customer')

@section('add-form')

<body class="flex">
    


<div class="add-form" style="margin-left: 20px;">

    <div class="half-page ">
        
        <form action="/post-customer" method="post" id="add-form" class="rounded-md form-container">
        <!--<form method="post" id="add-form">-->
            @csrf

        
                <h1 class="flex text-2xl font-bold mb-10 text-black"><b>Order Products</b> <br> </br></h1>

        
                    <label for="Select Data" >Select Data:</label>

                        <select name="name_value" id="name_value" >

                            @foreach($names as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach

                        </select>
                
                        
                    <label for="Quantity" >Quantity:</label>
                        <input 
                            type="number" 
                            name="quantity" 
                            id="quantity">


                        <div id="price"></div>
                        <div id="total" name="total_value"></div>

                        <br></br>
                        <br></br>



                <button type="submit" id="submit">Place Order </button>

            </div>
            </div>

        </form>

    </div>

@endsection



@section('my-orders')



<div class="my-orders half-page" style="margin-left: 20px;">

    <h1 class="p-8 text-center flex text-2xl font-bold mb-10 text-black"><b>My Order</b></h1>

    <table class="table-auto w-9/12" style="border:1px solid black;margin-left:auto;margin-right:auto; " >

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
    </table>
</div>


</body>


@endsection

