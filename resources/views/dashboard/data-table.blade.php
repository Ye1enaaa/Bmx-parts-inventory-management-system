@extends('dashboard.admin')

@section('top-bar')
<div class="bar">
    <ul class="">

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

        
            <div class="flex flex-wrap items-center justify-between w-full px-4 py-3 sm:flex-no-wrap">
            <div class="flex items-center justify-center mr-6 text-white">
                <span class="text-2xl font-bold font-serif sm:text-3xl">Liquor Inventory System</span>
            </div>

            <div class="flex items-center">
                <a class="hidden text-white sm:inline-block hover:text-gray-200 mx-16" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout

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

            <div class="flex flex-wrap sm:flex-nowrap justify-center">

              <div class="total-quantity bg-[#294D61] hover:bg-[#6DA5C0] rounded-lg w-80 font-serif text-2xl text-center p-10 m-4">
                <div class="icon text-white mb-2" style="float: right;">
                  <ion-icon name="wine" class="text-6xl"></ion-icon>
                </div>
                @yield('total-quantity')
              </div>

              <div class="total-inventory-value bg-[#0f969C] hover:bg-[#6DA5C0] rounded-lg w-80 font-serif text-2xl text-center p-10 m-4">
                <div class="icon text-white mb-2" style="float: right;">
                  <ion-icon name="trending-up-sharp" class="text-6xl"></ion-icon>
                </div>
                @yield('total-inventory-value')
              </div>

              <div class="total-admin bg-[#294D61] hover:bg-[#6DA5C0] rounded-lg w-80 font-serif text-2xl text-center p-10 m-4">
                <div class="icon text-white mb-2" style="float: right;">
                  <ion-icon name="people-circle-outline" class="text-6xl"></ion-icon>
                </div>
                @yield('customer-table')
              </div>

            </div>

            <div class="flex flex-wrap sm:flex-nowrap justify-center">

              <div class="sales bg-[#0f969C] hover:bg-[#6DA5C0] rounded-lg w-80 font-serif text-2xl text-center p-10 m-4">
                <div class="icon text-white mb-2" style="float: right;">
                  <ion-icon name="stats-chart-sharp" class="text-6xl"></ion-icon>
                </div>
                @yield('total-sales')
              </div>

              <div class="product-field bg-[#294D61] hover:bg-[#6DA5C0] rounded-lg w-80 font-serif text-2xl text-center p-10 m-4">
                <div class="icon text-white mb-2" style="float: right;">
                  <ion-icon name="pricetags-sharp" class="text-6xl"></ion-icon>
                </div>
                @yield('product-field')        
              </div>

            </div>
@endsection



