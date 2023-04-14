<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Product</title>
</head>

<body class="bg-gray-100 ">

    <form action="{{route('post')}}" method="post" class="px-4 my-32 max-w-3xl mx-auto space-y-6">
        @csrf

   
        <h1 class="flex text-4xl font-bold mb-10 text-black"><b>Add Products</b></h1>

         
    <div class= "h-900px w-950px bg-blue-400 px-10 space-y-10 mx-auto p-11 rounded-md">
        
        <div class="flex space-x-10">

            <div class="w-1/2">
                <label for="Name" class=" block mb-2 text-lg font-bold dark:text-white">Product Name:</label>
                <input 
                    class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-blue-500" 
                    type="text" 
                    name="name" required>

            </div>

            <div class="w-1/2">
                <label for="Quantity" class="block mb-2 text-lg font-bold dark:text-white">Quantity:</label>
                <input 
                    placeholder="1"
                    class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-blue-500" 
                    type="number" 
                    min="0"
                    name="quantity" required>

            </div>


        </div>    


             <div class="w-1/2">
                <label for="Price" class="block mb-2 text-lg font-bold dark:text-white">Price:</label>
               
                <div class="flex">
                    <div class="flex items-center px-4 bg-blue-800 text-white rounded-l">
                        PHP</div>
                        <input 
                            placeholder="1"
                            class="border border-gray-400 block py-2 px-4 w-full rounded-r focus:outline-none focus:border-blue-500" 
                            type="number" 
                            min="0"
                            name="unit_price" required>
                
       
               </div> 

             

            </div>

       
            <div class="w-1/2">
                <label for="Description" class="block mb-2 text-lg font-bold dark:text-white">Description:</label>
                <textarea 
                    name="description" 
                    class="form-control mb-3 bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:border-blue-500 block py-3 px-20" cols="70" rows="7" required>
                </textarea>


            </div>

        
        <button type="submit" class="btn btn-success col-md-3 text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>


    </div>
    

    </form>


    </div>


</body>

</html>