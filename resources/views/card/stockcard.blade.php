<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
    
        <link rel="stylesheet" href="{{asset('css/stockcard.css')}}">


    <title>Stock Card</title>


</head>

<body>
    <div class="container">
        <form action="/convert-to-pdf/{{$stockcard->id}}" method="GET">
            @unless(isset($noPrintButton))
            <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" download>
                Convert to PDF
            </button>
            @endunless
        </form>
        <br>
        
        <div class="bg-gray-100 rounded-lg shadow-md p-8">
            <div class="flex justify-end">
                <div class="-my-4 logo print-logo" style="width: 1in; height: 1in; margin-right: 0.625in;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/pictures/bmx.png'))) }}" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
            </div>

            <div class="title">STOCK CARD</div>
            <br>
            

           <div class="flex">
                <div class="flex-grow">
                    <h3 class="text-lg font-bold mb-2">Product Name: <span>{{$stockcard->name}}</span></h3>
                    <h3 class="text-lg font-bold mb-2">Product Code: <span>{{$stockcard->product_code}}</span></h3>
                </div>
                <div class="flex items-end justify-end">
                    <div>
                      <h3 class="text-lg font-bold mb-2">Unit Price: <span>₱ {{$stockcard->unit_price}}.00</span></h3>
                      <h3 class="text-lg font-bold mb-2">Stock on Hand: <span>{{$stockcard->quantity}} pcs.</span></h3>
                    </div>
                </div>
            </div>



            <table>
                <thead>
                    <tr style="background-color: #718096; color: #fff;">

                        <th>Date</th>
                        <th>Status</th>
                        <th>Received from:</th>
                        <th>Issued to:</th>
                        <th>No. Received:</th>
                        <th>No. Issued:</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stockcard['stockcard'] as $data)
                    <tr>
                        <td>{{$data['created_at']->format('Y-m-d')}}</td>
                        <td class="{{ $data['status'] === 'IN' ? 'status-in' : ($data['status'] === 'OUT' ? 'status-out' : '') }}">
                            {{ $data['status'] }}
                        </td>
                        <td>
                            @if($data['supplierName'])
                            {{$data['supplierName']}}
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if($data['customerName'])
                            {{$data['customerName']}}
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if($data['stockQuantity'])
                            +{{$data['stockQuantity']}}
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if($data['stockQuantityIssued'])
                            -{{$data['stockQuantityIssued']}}
                            @else
                            -
                            @endif
                        </td>
                        <td>₱ {{$data['stockBalance']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
