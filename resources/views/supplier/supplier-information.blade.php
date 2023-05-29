@extends('layouts.dashboard')

@section('content-supplier-information')


<div class="main-supplier-information">
    <h1 class="flex text-3xl font-bold mb-10 text-black ml-6"><b>Supplier Information</b></h1>

    <div class="table-container px-4">
        <table class="w-full border shadow">        
            <thead>
                <tr class="bg-black text-white">
                    <th class="px-3 py-2">Company Name</th>
                    <th class="px-3 py-2">Contact Number</th>
                    <th class="px-3 py-2">Email Address</th>
                    <th class="px-3 py-2">Office Address</th>
                    <th class="px-3 py-2">Date</th>
                    <th class="px-4 py-2">Product Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                    <td class="supplier-name text-center py-3 font-bold">
                        <span>{{ $supplier->name }}</span>
                    </td>
                    <td class="supplier-name text-center py-3">
                        <span>{{ $supplier->contact_number }}</span>
                    </td>
                    <td class="supplier-name text-center py-3">
                        <span>{{ $supplier->email_address }}</span>
                    </td>
                    <td class="supplier-name text-center py-3">
                        <span>{{ $supplier->desc }}</span>
                    </td>
                    <td class="supplier-name text-center py-3">
                        <span>{{ $supplier->created_at }}</span>
                    </td>
                    <td class="product-list text-center py-4 pr-8">
                        <div class="relative w-full">
                            <select name="supplier_id"
                                class="font-bold justify-center flex w-full p-3 border border-gray-400 bg-gray-200 rounded-lg">
                                @foreach($supplier->products as $product)
                                <option value="{{ $product->id }}" disabled selected>{{$product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br><br><br><br>
</div>

<script src="{{ asset('js/supplier.js') }}"></script>
@endsection
