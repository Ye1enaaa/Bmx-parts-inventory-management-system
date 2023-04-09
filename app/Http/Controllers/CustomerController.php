<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    //return view page

    public function returnCustomerViewPage(){
        $names = DB::table('products')->pluck('name');
        $user_id = Auth::user()->id;
        $orders = CustomerOrder::where('user_id', $user_id)->get();
        return view('customer.customer-preview', compact('names', 'orders'));
    }

    public function postCustomerOrder(Request $request){
        $name_value=$request->input('name_value');
        $quantity=$request->input('quantity');
        $total_value = $request->input('total_value');
        $order = new CustomerOrder;
        $order -> user_id = auth()->id();
        $order -> name = $name_value;
        $order -> quantity = $quantity;
        $order->total_value = $total_value;
        $order->save();
        //DB::table('customer_orders')->insert(['name' => $name_value, 'quantity'=>$quantity]);
        return redirect()->back();
    }

    public function returnRecentOrderPage($id){   
        $userorder = CustomerOrder::with('user')->findOrFail($id);

        //return view('dashboard.data-table',[
          //  'user_order' => $user_order,
        //]);
    }
}