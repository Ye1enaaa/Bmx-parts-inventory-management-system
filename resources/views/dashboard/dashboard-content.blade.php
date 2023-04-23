@extends('dashboard.data-table')


<div class="dashboard-content">

    <div class="product-field bg-cyan-600 hover:bg-cyan-500">
        <div class="icon"><ion-icon name="pricetags-outline"></ion-icon> </div>
        @yield('product-field')
        
    </div>
    

    <div class="total-quantity bg-green-600 hover:bg-green-500 ">
        <div class="icon"><ion-icon name="wine"></ion-icon> </div>
        @yield('total-quantity')

    </div>



    <div class="total-inventory-value bg-red-600 hover:bg-red-500">
        <div class="icon"><ion-icon name="trending-up-sharp"></ion-icon> </div>
        @yield('total-inventory-value')
    </div>



    <div class="total-admin bg-orange-500 hover:bg-orange-400">
        <div class="icon"><ion-icon name="people-circle-outline"></ion-icon> </div>
        @yield('total-customers')
    </div>

    <div class="sales bg-violet-500 hover:bg-orange-400">
        <div class="icon"><ion-icon name="storefront-outline"></ion-icon> </div>
        @yield('total-sales')
    </div>