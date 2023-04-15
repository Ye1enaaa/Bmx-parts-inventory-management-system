<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/purchase-order.css')}}">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Fredoka">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Customer Order</title>
</head>


<body class="bg-white-700 ">

    <div class="mt-4">


   <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold mb-5 text-black">Recent Orders</h1>
          
   </div>

    <div class="mt-4">


        <table class="table-auto w-full">
            <thead class="text-white bg-blue-900 border-gray-900 ">
                <tr class="text-center font bold">
                    <th class="px-4 py-2">Order Date</th>
                    <th class="px-4 py-2">Customer Name</th>
                    <th class="px-4 py-2">Product</th>
                    <th class="px-4 py-2">Quantity</th>
                    <th class="px-4 py-2">Total Value</th>
                </tr>
            </thead>
            <tbody class="text-black text-center divide-y divide-blue-100">
                @foreach ($customerOrders as $order)
                <tr>
                    <td class="border px-3  py-2">{{ $order->created_at }}</td>
                    <td class="border px-3  py-2">{{ $order->user->name }}</td>
                    <td class="border px-3  py-2">{{ $order->name }}</td>
                    <td class="border px-3  py-2">{{$order->quantity }} pcs.</td>
                    <td class="border px-3  py-2">₱ {{ $order->total_value }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
</body>
</html>