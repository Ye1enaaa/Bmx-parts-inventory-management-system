@extends('dashboard.admin')

@section('content')


@section('top-bar')
<div class="bar">
    <ul class="">

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

        
            <div class="flex flex-wrap items-center justify-between w-full px-4 py-3 sm:flex-no-wrap">
            <div class="flex items-center justify-center mr-6 text-white">
                <span class="ml-60 text-2xl font-bold font-serif sm:text-3xl">Liquor Inventory System</span>
            </div>

            <div class="flex items-center">
                <a class="hidden text-white sm:inline-block hover:text-gray-200 mx-16" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
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

        <p class="title-text"> Product </p>
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
        <p class="quantity-title">Liquor Quantity</p>
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
            Customers
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






