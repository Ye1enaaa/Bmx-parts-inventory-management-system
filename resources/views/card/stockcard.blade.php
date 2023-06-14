<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="https://cdn.tailwindcss.com"></script>


    <title>Stock Card</title>
<!-- <script>
  function filterStockCardByMonth(month) {
    var rows = document.querySelectorAll('tbody tr');

    rows.forEach(function(row) {
      var date = row.querySelector('td:first-child').innerText;
      var rowMonth = new Date(date).getMonth() + 1;

      if (month === "" || rowMonth == month) {
        row.style.display = 'table-row';
      } else {
        row.style.display = 'none';
      }
    });
  }
</script> -->


<style>
    body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
}

.container {
    max-width: 100%;
    margin: 0 20px; /* Adjust the value as needed */

}

.title {
    text-align: center;
    font-size: 2rem;
    font-weight: bold;
    color: black;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    border: 1px solid #000;
    padding: 8px;
    text-align: center;
}

.status-in {
    background-color: #48bb78;
    color: #fff;
}

.status-out {
    background-color: #f56565;
    color: #fff;
}
@media print {
    tr.bg-gray-700 th {
        background-color: #718096 !important;
        color: #fff !important;
    }



}


</style>

</head>

<body>
    <div class="container ml-8">
         

            <form action="/convert-to-pdf/{{$stockcard->id}}" method="GET">
                @unless(isset($noPrintButton))
                <button type="submit" class="ml-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" download>
                    Convert to PDF
                </button>
                @endunless

            </form> 
           

        <br>

        <div class="bg-gray-200 rounded-lg shadow-2xl p-8 mr-8">
            <div class="flex justify-end">
                <div class="-my-4 logo print-logo" style="width: 1in; height: 1in; margin-right: 0.625in;">
                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/pictures/bmx.png'))) }}" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
            </div>

            <div class="title">STOCK CARD</div>
            <br> <br>

        

            <div class="flex">
                <div class="flex-grow ml-20">
                    <h3 class="text-lg font-bold mb-2">Product Name: <span>{{$stockcard->name}}</span></h3>
                    <h3 class="text-lg font-bold mb-2">Product Code: <span>{{$stockcard->product_code}}</span></h3>
                </div>
                <div class="flex items-end justify-end mr-32">
                    <div>
                      <h3 class="text-lg font-bold mb-2">Unit Price: <span>₱ {{$stockcard->unit_price}}.00</span></h3>
                      <h3 class="text-lg font-bold mb-2">Stock on Hand: <span>{{$stockcard->quantity}} pcs.</span></h3>
                    </div>
                </div>
            </div>
            <br>

            <div class="flex-grow ml-20 text-lg font-bold mb-2">

                <label for="monthFilter">Filter by Month:</label>
                  <select id="monthFilter" onchange="filterStockCardByMonth(this.value)">
  <option value="">All Months</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
    
            <table class="w-full mt-4 border border-black">
            <thead>
                <tr style="background-color: #718096; color: #fff;">
                <th class="border p-2 text-center">Date</th>
                <th class="border p-2 text-center">Status</th>
                <th class="border p-2 text-center">Received from:</th>
                <th class="border p-2 text-center">Issued to:</th>
                <th class="border p-2 text-center">No. Received:</th>
                <th class="border p-2 text-center">No. Issued:</th>
                <th class="border p-2 text-center">Balance</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stockcard['stockcard'] as $data)
                <tr>
                <td>{{$data['created_at']->format('Y-m-d')}}</td>

                <td class="{{ $data['status'] === 'IN' ? 'status-in' : ($data['status'] === 'OUT' ? 'status-out' : '') }}">
                     {{ $data['status'] }}
                </td>
                <td class="border p-2 text-center">
                    @if( $data['supplierName'] )
                    {{$data['supplierName']}}
                    @elseif( $data['supplierName'] == null )
                    - 
                    @endif
                </td>
                <td class="border p-2 text-center">
                @if( $data['customerName'] )
                    {{$data['customerName']}}
                @elseif( $data['customerName'] == null )
                - 
                @endif
                </td>
                <td class="border p-2 text-center">
                    @if( $data['stockQuantity'] )
                    +{{$data['stockQuantity']}}
                    @elseif( $data['stockQuantity'] == null )
                    -
                    @endif
                </td>
                <td class="border p-2 text-center">
                    @if( $data['stockQuantityIssued'] )
                    -{{$data['stockQuantityIssued']}}
                    @elseif( $data['stockQuantityIssued'] ==null )
                    -
                    @endif
                </td>
                <td class="border p-2 text-center">{{$data['stockBalance']}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>


  </div>
</div>

<script>
    function filterStockCardByMonth(month) {
        var rows = document.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            var date = row.querySelector('td:first-child').textContent;
            var rowMonth = new Date(date).getMonth() + 1;

            if (month === "" || rowMonth == month) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>


</body>
</html>