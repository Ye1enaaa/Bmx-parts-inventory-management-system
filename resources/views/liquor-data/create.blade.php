<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <form action="{{route('post')}}" method="post">
        @csrf
        <label for="">Name:</label>
        <input type="text" class="form-control mb-3" name="name" required>
        <label for="">Price:</label>
        <input type="number" class="form-control mb-3" name="unit_price" required>
        <label for="">Quantity:</label>
        <input type="number" class="form-control mb-3" name="quantity" required>
        <label for="">Description:</label>
        <textarea name="description" class="form-control mb-3" cols="30" rows="5" required></textarea>
        <button type="submit" class="btn btn-success col-md-3">Submit</button>
    </form>
</body>
</html>