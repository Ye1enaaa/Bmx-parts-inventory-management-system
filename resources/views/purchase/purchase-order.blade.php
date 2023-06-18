@extends('layouts.dashboard')

@section('content-purchase-order')

<div id="mySidebar" class="sidebar">
  <!-- Sidebar content -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
</div>

<div class="main-purchase-order">

  <div class="mt-4">
    <div class="flex items-center justify-between">
      <h1 class="text-3xl font-bold mb-5 text-black">Recent Orders</h1>
    </div>

    <div class="mt-4">
      <table class="table-auto w-full">
        <thead class="text-white bg-[#313131] border-gray-900">
          <tr class="text-center font-bold">
            <th class="px-4 py-2">Order Date</th>
            <th class="px-4 py-2">Customer Name</th>
            <th class="px-4 py-2">Product</th>
            <th class="px-4 py-2">Quantity</th>
            <th class="px-4 py-2">Total Value</th>
          </tr>
        </thead>
        <tbody class="text-black text-center divide-y divide-blue-100">
          @foreach ($customerOrders->sortByDesc('created_at') as $order)
          <tr>
            <td class="border px-3 py-2">{{ $order->created_at }}</td>
            <td class="border px-3 py-2">{{ $order->user->name ?? 'No User' }}</td>
            <td class="border px-3 py-2">{{ $order->name }}</td>
            <td class="border px-3 py-2">{{ $order->quantity }} pcs.</td>
            <td class="border px-3 py-2">₱ {{ $order->total_value }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
