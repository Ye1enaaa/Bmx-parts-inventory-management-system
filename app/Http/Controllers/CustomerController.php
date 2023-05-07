<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
class CustomerController extends Controller
{
    //return view page

    public function returnCustomerViewPage(){
        $names = DB::table('products')->pluck('name');
        $user_id = Auth::user()->id;
        $orders = CustomerOrder::where('user_id', $user_id)->orderBy('created_at','desc')->get(); // Edited
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

        $product = Product::where('name', $name_value)->first();
        if($product -> quantity - $quantity <= 0){
            $product->delete();
        }else{
            $product->quantity -= $quantity;
            $product->inventory_value -= $quantity * $product->unit_price;
            $product->save();
        }
        //$product -> quantity -= $quantity;
        //$product -> inventory_value -= $quantity * $product->unit_price;
        //$product ->save();
        //DB::table('customer_orders')->insert(['name' => $name_value, 'quantity'=>$quantity]);
        return redirect()->back();
    }

    public function returnRecentOrderPage($id){   
        $userorder = CustomerOrder::with('user')->findOrFail($id);

        //return view('dashboard.data-table',[
          //  'user_order' => $user_order,
        //]);
    }

    // public function returnSalesByData(){
    //     $salesByDay = DB::table('customer_orders')
    //     ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as day, SUM(total_value) as total'))
    //     ->groupBy('day')
    //     ->get();

    //     return view('graphs.sales', compact('salesByDay'));
    // }


    public function returnSalesByData(){
        $salesByDay = DB::table('customer_orders')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as day, SUM(total_value) as total'))
            ->groupBy('day')
            ->get();

        return view('graphs.sales')->with('salesByDay', $salesByDay)->render();
    }




}
