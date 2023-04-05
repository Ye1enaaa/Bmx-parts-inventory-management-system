<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Login</title>
</head>
<body>

    <div
         class="w-full h-full bg-cover bg-blend-saturation"
            style="background-image: url('https://cdn.pixabay.com/photo/2016/11/21/13/04/alcoholic-beverages-1845295_960_720.jpg');">
    </div>
    
    <form action="{{route('login.admin')}}" method="post">
        @csrf
        <div class="flex justify-center items-center h-screen bg-blue-500">
            <div class="w-96 p-6 shadow-lg bg-white rounded-md">
                <h1 class="block text-center font-semibold">Login</h1>
                <hr class="mt-3">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Email</label>
                    <input type="text" id="email" name="email" placeholder="Example: a@gmail.com" class="border w-full text-base px-2 py-1 focus:outline-none">
                </div>
                <div class="mt-3">
                    <label for="password" class="block text-base mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password" class="border w-full text-base px-2 py-1 focus:outline-none">
                </div>
                <div class="mt-3">
                    <button type="submit" class="block items-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Log In</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>