@extends('layouts.dashboard')

@section('content-supplier-add')
<div class="main-supplier-add">
<h1 class="flex text-3xl font-bold mb-10 text-black ml-6"><b>Add Supplier</b></h1>
<form action="{{ route('supplier.add') }}" method="post" class="px-1 max-w-3xl mx-auto space-y-6">
    @csrf
    <div class="h-900px w-950px bg-[#e6e3e3] px-10 space-y-10 mx-auto p-11 rounded-md border border-black shadow-2xl">
        <div class="flex space-x-10">
            <div class="w-1/2">
                <label for="Name" class="block mb-2 text-lg font-bold dark:text-white">Company Name:</label>
                <input class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-blue-500"
                    type="text" name="name" required id="name" placeholder="Name">
            </div>
            <div class="w-1/2">
                <label for="Number" class="block mb-2 text-lg font-bold dark:text-white">Contact Number:</label>
                <input
                    class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-blue-500"
                    type="number" name="contact_number" required id="number" placeholder="Ph: 09518052760">
            </div>
        </div>
        <div>
            <label for="Email" class="block mb-2 text-lg font-bold dark:text-white">Email Address:</label>
            <input class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-blue-500"
                type="text" name="email_address" required id="Email" placeholder="Email">
        </div>
        <div>
            <label for="Address" class="block mb-2 text-lg font-bold dark:text-white">Address:</label>
            <input name="address" id="address" placeholder="Address"
                class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none focus:border-blue-500"
                required>
        </div>
        <div class="justify-center flex">
            <button type="submit"
                class="btn btn-success col-md-3 text-white bg-green-700 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </div>
</form>

@endsection