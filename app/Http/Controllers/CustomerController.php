<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //return view page

    public function returnCustomerViewPage(){
        return view('customer.customer-preview');
    }
}
