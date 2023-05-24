<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://cdn.tailwindcss.com"></script>

    <title>Stock Card</title>
</head>

<body class="bg-[#428fb6] p-4">
<div class="font-serif mx-auto ">

  <div class="bg-white rounded-lg shadow-md p-6">
    <h1 class="text-4xl font-bold mb-4 flex justify-center font-serif ">STOCK CARD</h1>

    <br><br>

<form action="/convert-to-pdf" method="GET">
  <button type="submit" class="ml-14 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" download>
    Convert to PDF
  </button>
</form>


        <br>

    <h3 class="ml-14 text-lg font-bold mb-2">Product Name: <span class="ml-14">{{$stockcard->name}}</span></h3>
    <h3 class="ml-14 text-lg font-bold mb-2">Product Code: <span class="ml-14">{{$stockcard->product_code}}</span></h3>
    <h3 class="ml-14 text-lg font-bold mb-2">Unit Price:   <span class="ml-24">₱ {{$stockcard->unit_price}}.00</span></h3>
    <h3 class="ml-14 text-lg font-bold mb-2">Stock on Hand: <span class="ml-14">{{$stockcard->quantity}} pcs.</span></h3>
    
    
<table class="w-full mt-4 border border-black">
  <thead>
    <tr>
      <th class="border p-2 text-center">Date</th>
      <th class="border p-2 text-center">Status</th>
      <th class="border p-2 text-center">Received from/Issued to:</th>
      <th class="border p-2 text-center">No. Received/Issued</th>
      <th class="border p-2 text-center">New Balance</th>
    </tr>
  </thead>
  <tbody>
    @foreach($stockcard['stockcard'] as $data)
    <tr>
      <td class="border p-2 text-center">{{$data['created_at']}}</td>
      <td class="border p-2 text-center {{ $data['status'] === 'IN' ? 'bg-green-500' : ($data['status'] === 'OUT' ? 'bg-red-500' : '') }}">
        {{ $data['status'] }}
      </td>
      <td class="border p-2 text-center">{{$data['supplierName']}}</td>
      <td class="border p-2 text-center">{{$data['stockQuantity']}}</td>
      <td class="border p-2 text-center">{{$data['stockBalance']}}</td>
    </tr>
    @endforeach
  </tbody>
</table>



  </div>
</div>


</body>
</html>