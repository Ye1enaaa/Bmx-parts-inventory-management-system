<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validators;
use App\Models\User;
use App\Models\Sales;
use App\Models\CustomerOrder;
//use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    //Api mobile
    public function returnBarcodeData(Request $request,string $product_code){
        $productCode = Product::where('product_code', $product_code)->get();
        //$productCode = DB::table('products')->where('product_code', $product_code)->get();
        return response([
            'product' => $productCode
        ]);
    }

    public function addData(Request $request){
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

        return response([
            'order' => $order,
            'priduct' =>$product
        ]);
    }

    public function expData(){

    }
}
