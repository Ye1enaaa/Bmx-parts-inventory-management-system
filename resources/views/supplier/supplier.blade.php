<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
</head>
<body>
    <div class="add-supplier">
        <form action="{{route('supplier.add')}}" method="post">
            @csrf
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="text" name="contact_number" id="number" placeholder="Number">
            <input type="text" name="desc" id="desc" placeholder="Description">
            <button type="submit">Submit</button>
        </form>
    </div>
    
</body>
</html>