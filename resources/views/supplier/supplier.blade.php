@extends('layouts.dashboard')

@section('content-supplier')


<div id="mySidebar" class="sidebar">
    <!-- Sidebar content -->
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

  </div>


  <div class="main-supplier">


    <div class="add-supplier">
        <form action="{{route('supplier.add')}}" method="post" class="px-1 max-w-3xl mx-auto space-y-6>
            @csrf

             <h1 class="flex text-4xl font-bold mb-10 text-black"><b>Add Supplier</b></h1>


            <div class= "h-900px w-950px bg-blue-400 px-10 space-y-10 mx-auto p-11 rounded-md">

            <div class="flex space-x-10">

                <div class="w-1/2">
                    
                    <label for="Name" class=" block mb-2 text-lg font-bold dark:text-white">Name:</label>
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

                <div class="w-1/2">
                    <label for="Description" class="block mb-2 text-lg font-bold dark:text-white">Description:</label>
                    <textarea 
                        name="description" 
                        id="desc" 
                        placeholder="Description"
                        class="form-control mb-3 bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:border-blue-500 block py-3 px-20" cols="70" rows="7" required>
                        
                    
                    </textarea>


                </div>


            <button type="submit" class="btn btn-success col-md-3 text-white bg-gray-900 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

  
            <!-- <button type="submit">Submit</button> -->
        </form>
    </div>  
    
    </div>

@endsection