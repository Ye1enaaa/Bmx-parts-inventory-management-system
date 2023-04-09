@extends('customer.customer')

@section('add-form')
<div class="add-form">
    <form action="/post-customer" method="post" id="add-form">
    <!--<form method="post" id="add-form">-->
        @csrf
        <h1>Select Data</h1>
        <select name="name_value" id="name_value">
            @foreach($names as $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>
        <input type="number" name="quantity" id="quantity">
        <div id="price"></div>
        <div id="total" name="total_value"></div>
        <br><br>
        <button type="submit" id="submit">Place Order</button>
    </form>
</div>
@endsection

@section('my-orders')
<div class="my-orders">
    @foreach($orders as $order)
    <div class="order">
        <h3>My Order</h3>
        <p>Order Date: {{ $order->created_at }}</p>
        <p>Name: {{ $order->name }}</p>
        <p>Quantity: {{ $order->quantity }}</p>
    </div>
    @endforeach
</div>
@endsection