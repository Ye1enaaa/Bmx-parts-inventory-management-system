<!DOCTYPE html>
<html>
    <head>
        <title>Understocked Products</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body >
        <h1 class="text-3xl font-bold ml-8 mt-8">Understock Products</h1>
        <br>
        <div class="bg-gray-200 ml-8 mr-8">
            <table class="w-full border-collapse mt-8">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="py-2 px-4 border-b">Product Code</th>
                        <th class="py-2 px-4 border-b">Product Name</th>
                        <th class="py-2 px-4 border-b">Quantity Left</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $stock)
                    <tr class="hover:bg-gray-50 text-center">
                        <td class="py-2 px-4 border-b">{{$stock->product_code}}</td>
                        <td class="py-2 px-4 border-b">{{ $stock->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $stock->quantity }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>