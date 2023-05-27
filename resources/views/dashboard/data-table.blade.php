@extends('dashboard.admin')

@section('top-bar')
<div class="bar">
    <ul class="">

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

        
            <div class="flex flex-wrap items-center justify-between w-full px-4 py-3 sm:flex-no-wrap">
            <div class="flex items-center justify-center mr-6 text-white">
                <span class="text-1xl font-bold sm:text-2xl">BMX: Dirt Jump Parts Inventory System</span>
            </div>

            <div class="flex items-center">
                <a class="hidden text-white sm:inline-block hover:text-gray-200 mx-16" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Admin  <i class=" fas fa-sign-out-alt mr-2"></i> 

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                    </form>
                </a>
 
            </div>
        </div>
        
    </ul>

</div>


@endsection

<!--<h3 class="number">{{$count}} products</h3>-->

@section('product-field')
<div class="product-field">
    <div class="title">

        <p class="title-text"> Stock </p>
    </div>
    <div class="data">
        <p>
            {{$count}} pcs.
        </p>
    
</div>

@endsection

@section('total-quantity')
<div class="total-quantity">
    <div class="title">
        <p class="quantity-title"> Quantity</p>
    </div>
    <div class="data">
        <p>
            {{$total_quantity}} pcs.
        </p>
    </div>
</div>
@endsection

@section('total-inventory-value')
<div class="total-inventory-value">
    <div class="title">
        <p class="inven-value">Total Inventory Value</p>
    </div>
    <div class="data">
        <p>
            ₱ {{$total_inventory}}
        </p>
    </div>
</div>
@endsection

@section('customer-table')
<div class="total-admin"> <!--ug unsa naa diri nga class name mao dapat naa didto sa parent class-->
    <div class="title">
        <p class="title-text">
            Suppliers
        </p>
    </div>
    <div class="data">
        <p>
            {{$total_admin}}
        </p>
    </div>
</div>
@endsection

@section('total-sales')
<div class="total-sales">
    <div class="title">
    <p class="sales-title">
        Sales
    </p>
    </div>
    <div class="data">
        <p>
            ₱ {{$total_value}}
        </p>
    </div>
</div>
@endsection



@section('content-dashboard')

        <div class="flex flex-wrap sm:flex-nowrap ">

             <div class="relative">
                <div class="total-quantity bg-blue-600 hover:bg-blue-500 rounded-lg w-80 h-40 font-serif text-2xl text-center p-10 m-4 transform perspective-500 rotateX-12 shadow shadow-black" style="transform: translateZ(-30px);">
                    <div class="icon text-white mb-2" style="float: right; animation: moveIcon 3s infinite alternate;">
                        <ion-icon name="bicycle-outline" class="text-6xl"></ion-icon>
                    </div>
                    @yield('total-quantity')
                </div>
            </div>

            <div class="relative">
                <div class="total-inventory-value bg-yellow-600 hover:bg-yellow-500 rounded-lg w-80 h-40 font-serif text-2xl text-center p-10 m-4 transform perspective-500  shadow shadow-black" style="transform: translateZ(-30px);">
                    <div class="icon text-white mb-2" style="float: right; animation: moveIicon 3s infinite alternate;">
                    <ion-icon name="trending-up-sharp" class="text-6xl"></ion-icon>
                    </div>
                    @yield('total-inventory-value')
                </div>
            </div>
        </div>

            <div >
                <div class="flex flex-wrap ">

                <div class="relative">
                    <div class="Sales bg-red-600 hover:bg-red-500 rounded-lg w-80 h-40 font-serif text-2xl text-center p-10 m-4 transform perspective-500  shadow shadow-black" style="transform: translateZ(-30px);">
                        <div class="icon text-white mb-2" style="float: right; animation: moveIicon 3s infinite alternate;">
                            <ion-icon name="stats-chart-sharp" class="text-6xl"></ion-icon>
                        </div>
                        @yield('total-sales')
                    </div>
                </div>    

                <div class="relative">
                    <div class="Total-admin bg-purple-600 hover:bg-purple-500 rounded-lg w-80 h-40 font-serif text-2xl text-center p-10 m-4 transform perspective-500 rotateX-12 shadow shadow-black" style="transform: translateZ(-30px);">
                        <div class="icon text-white mb-2" style="float: right; animation: moveIcon 3s infinite alternate;">
                            <ion-icon name="person" class="text-6xl"></ion-icon>
                        </div>
                        @yield('customer-table')
                    </div>
                </div>  

              

            </div>
            
            <div class="relative">
                <div class="product-field bg-green-600 hover:bg-green-500 rounded-lg w-80 h-40 font-serif text-2xl text-center p-10 m-4 transform perspective-500  shadow shadow-black" style="transform: translateZ(-30px);">
                    <div class="icon text-white mb-2" style="float: right; animation: moveIicon 3s infinite alternate;">
                  <ion-icon name="pricetags-sharp" class="text-6xl"></ion-icon>
                </div>
                @yield('product-field')        
              </div>
            </div>

            </div>


                <div class="ml-auto container  w-80 ">

                    <div class="rounded-lg wrapper text-white">

                        <header>
                            <p class="current-date"> </p>
                            <div class="icons">
                            <span id="prev" class="material-symbols-rounded">chevron_left</span>
                            <span id="next" class="material-symbols-rounded">chevron_right</span>

                        </header>

                        <div class="calendar p-4">

                            <ul class="weeks">
                            <li>Sun</li>
                            <li>Mon</li>
                            <li>Tue</li>
                            <li>Wed</li>
                            <li>Thu</li>
                            <li>Fri</li>
                            <li>Sat</li>
                            </ul>

                            <ul class="days"></ul>

                        </div>
                    </div>
                    
                </div>
<script src="script.js" defer></script>
        
@endsection



