<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Product</title>
</head>

<body class="p-2 h-screen bg-gray-500 ">


    <h1 class="flex text-4xl font-bold mb-10 text-white"><b>Add Products</b></h1>


    
        
    
    <form action="{{route('post')}}" method="post">
        @csrf

        <div class="mb-6 ">
            <label for=""class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name:</label>
            <input type="text" class="form-control mb-3 bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:border-blue-500 block py-3 px-20" name="name" required>
        </div>



        <label for=""class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price:</label>
        <input type="number" class="form-control mb-3 bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:border-blue-500 block py-3 px-20" name="unit_price" required>

        <label for=""class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity:</label>
        <input type="number" class="form-control mb-3 bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:border-blue-500 block py-3 px-20" name="quantity" required>

        <label for=""class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
        <textarea name="description" class="form-control mb-3 bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:border-blue-500 block py-3 px-20" cols="30" rows="5" required></textarea>

        <button type="submit" class="btn btn-success col-md-3 text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

        

       
    </form>

    </div>


    

</body>

</html>