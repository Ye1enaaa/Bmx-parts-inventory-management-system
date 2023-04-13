<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/purchase-order.css')}}">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Fredoka">
    <title>Purchase</title>
</head>
<body>
<div class="recent-order">
<table>
    <thead>
        <tr>
            <th>User Name</th>
            <th>Product</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customerOrders as $order)
        <tr>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->quantity }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</body>
</html>