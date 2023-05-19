
@extends('layouts.dashboard')

@section('content-supplier')


    <link rel="stylesheet" href="{{ asset('css/supplier.css') }}">

    <script src="{{ asset('js/supplier.js') }}"></script>


    <div id="mySidebar" class="sidebar">
    <!-- Sidebar content -->
    </div>
    <br>

<div class="main-supplier">


        <button id="show-popup-btn" class="btn btn-primary items-center justify-center py-2 px-4 text-white font-bold 
        bg-blue-500 hover:bg-blue-400 rounded-md float-right" onclick="showPopupFormSupplier()">Add Supplier</button>

    <br>

    <h1 class="flex text-3xl font-bold mb-10 text-black"><b>Supplier Information</b></h1>



    <table class="w-full border shadow ">


        <thead>
            <tr class="bg-black text-white">

                <th class="px-3 py-2">Company Name</th>
                <th class="px-3 py-2">Contact Number</th>
                <th class="px-3 py-2">Email Address</th>
                <th class="px-3 py-2">Office Address</th>
                <th class="px-3 py-2">Date</th>
                <th class="px-4 py-2 ">Product Name</th>
                

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
                            <select name="supplier_id" class="font-bold justify-center flex w-full p-3 border border-gray-400 bg-gray-200 rounded-lg ">
                                <!-- <option value="" disabled selected>Select Product</option> -->
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
 

    <br> <br><br><br>

            <div id="popup-container">
                <form action="{{route('supplier.add')}}" method="post" class="px-1 max-w-3xl mx-auto space-y-6">
                    <br>
                    @csrf


                    <div class="h-900px w-950px bg-[#e6e3e3] px-10 space-y-10 mx-auto p-11 rounded-md border border-black shadow-lg">

                        <h1 class="justify-center flex text-4xl font-bold mb-10 text-black"><b>Add Supplier</b></h1>
                        


                            <div class="flex space-x-10">

                                <div class="w-1/2">
                                    
                                    <label for="Name" class=" block mb-2 text-lg font-bold dark:text-white">Company Name:</label>
                                        <input 
                                            class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-blue-500" 
                                            type="text" 
                                            name="name" required
                                            id="name" 
                                            placeholder="Name">

                                </div>

                                <div class="w-1/2">

                                    <label for="Name" class=" block mb-2 text-lg font-bold dark:text-white">Contact Number:</label>
                                        <input 
                                            class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-blue-500" 
                                            type="number" 
                                            name="contact_number" required
                                            id="number" 
                                            placeholder="Ph: 09518052760">

                                </div>

                            </div>


                            <div>
                                <label for="Email" class=" block mb-2 text-lg font-bold dark:text-white">Email Address:</label>
                                    <input 
                                        class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-blue-500" 
                                        type="text" 
                                        name="email_address" required
                                        id="Email" 
                                        placeholder="Email">


                            </div>

                            <div class="w-1/2">
                                <label for="Description" class="block mb-2 text-lg font-bold dark:text-white">Address:</label>
                                <textarea 
                                    name="desc" 
                                    id="desc" 
                                    placeholder="Description"
                                    class="form-control mb-3 bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:border-blue-500 block py-3 px-20" cols="70" rows="5" required>
                                    
                                
                                </textarea>


                            </div>

                            <div class="justify-center flex">
                                <button type="submit" class="btn btn-success col-md-3 text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                                <button type="button" class="text-white ml-6 bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="hidePopupFormSupplier()">Cancel</button>
                            </div>
   
                    </div>
                </form>
            </div>
          

    
</div>


@endsection
