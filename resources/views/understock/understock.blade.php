<!DOCTYPE html>
<html>
<head>
    <title>Understocked Products</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <h1 class="text-3xl font-bold  mt-8">Understocked Products</h1>
    <table class="w-full border-collapse mt-8">
        <thead>
            <tr class="bg-gray-100">
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
</body>
</html>
