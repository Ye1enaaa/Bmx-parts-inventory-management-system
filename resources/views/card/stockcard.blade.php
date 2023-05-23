<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Card</title>
</head>
<body>
    <h3>Product Name: {{$stockcard->name}}</h3>
    <h3>Product Code: {{$stockcard->product_code}}</h3>
    <h3>Unit Price: P{{$stockcard->unit_price}}.00</h3>
    <h3>Stock on Hand: {{$stockcard->quantity}}</h3>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Status</th>
                <th>Received from/Issued to:</th>
                <th>No.Received/Issued</th>
                <th>New Balance</th>              
            </tr>
        </thead>
        <tbody>
            @foreach($stockcard['stockcard'] as $data)
                <tr>
                    <td>{{$data['created_at']}}</td>
                    <td>{{$data['status']}}</td>
                    <td>{{$data['supplierName']}}</td>
                    <td>{{$data['stockQuantity']}}</td>
                    <td>{{$data['stockBalance']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>