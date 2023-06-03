<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validators;
use App\Models\User;
use App\Models\Sales;
use App\Models\CustomerOrder;
use App\Models\StockCard;
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


    //--------------------------STOCK IN--------------------------\\
    public function readQrCode(string $product_code){
        $product = Product::with('supplier')->where('product_code', $product_code)->first();
        return response()->json([
            'stock' => $product,
            'stockName' => $product->name,
            'supplier' => $product->supplier->name
        ]);
    }
    public function stockIn(Request $request){
        /*$product = Product::where('product_code',$product_code)->first();
        $productCode = $product->product_code;
        $productId = $product->id;
        $productName = $product->name;
        if(!$productCode){
            return response()->json([
                'error' => 'Not Found'
            ],404);
        }*/

        //$name=$request->input('stockName');
        $stockquantity = $request->input('stockQuantity');
        $stockname = $request->input('stockName');
        $suppliername = $request->input('supplierName');
        $productid = $request->input('product_id');

        $stockin = new StockCard;
        $stockin -> status = "IN";
        $stockin -> stockName = $stockname;
        $stockin -> supplierName = $suppliername;
        $stockin -> stockQuantity = $stockquantity;
        $stockin -> product_id = $productid;
        //$stockin->save();

        $product = Product::where('name',$stockname)->first();

        if($product){
            $product->quantity += $stockquantity;
            $product->inventory_value += $stockquantity * $product->unit_price;
            
        }else if(!$product){
            return response([
                'error' => 'Not Found'
            ], 404);
        }

        $stockin->stockBalance = $product->quantity;
        $stockin->save();
        $product->save();
        return response()->json([
            'stockhistory' => $stockin 
        ]);
    }
    //----------------------STOCK OUT---------------------\\
    public function stockOut(Request $request){
        $stockquantity = $request->input('stockQuantityIssued');
        $stockname = $request->input('stockName');
        $customername = $request->input('customerName');
        $productid = $request->input('product_id');

        $stockout = new StockCard;
        $stockout -> status = "OUT";
        $stockout -> stockName = $stockname;
        $stockout -> customerName = $customername;
        $stockout -> stockQuantityIssued = $stockquantity;
        $stockout -> product_id = $productid;
        //$stockin->save();

        $product = Product::where('name',$stockname)->first();

        if($product){
            $product->quantity -= $stockquantity;
            $product->inventory_value -= $stockquantity * $product->unit_price;
            
        }else if(!$product){
            return response([
                'error' => 'Not Found'
            ], 404);
        }

        $stockout->stockBalance = $product->quantity;
        $stockout->save();
        $product->save();
        return response()->json([
            'stockhistory' => $stockout 
        ]);
    }
}
