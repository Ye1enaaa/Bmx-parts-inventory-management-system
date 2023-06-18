<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockCard;
class ReturnByCustomerController extends Controller
{
    //----------------------RETURN STOCK---------------------\\
    public function returnInExchange(Request $request){
        $stockquantityreturn = $request->input('stockQuantityReturn');
        $stockname = $request->input('stockName');
        $customername = $request->input('customerName');
        $productid = $request->input('product_id');
        $comments = $request->input('comments');

        $return = new StockCard;
        $return -> status = "RETURN";
        $return -> stockName = $stockname;
        $return -> customerName = $customername;
        $return -> stockQuantity = $stockquantityreturn;
        $return -> comments = $comments;
        $return -> product_id = $productid;
        //$stockin->save();

        $product = Product::where('name',$stockname)->first();

        if($product){
            $product->quantity += $stockquantityreturn;
            $product->inventory_value += $stockquantityreturn * $product->unit_price;
            
        }else if(!$product){
            return response([
                'error' => 'Not Found'
            ], 404);
        }

        $return->stockBalance = $product->quantity;
        $return->save();
        $product->save();
        return response()->json([
            'stockhistory' => $return
        ]);
    }

    public function returnDueToDamage(Request $request){
        $stockquantityreturn = $request->input('stockQuantityReturn');
        $stockname = $request->input('stockName');
        $customername = $request->input('customerName');
        $productid = $request->input('product_id');
        $comments = $request->input('comments');

        $return = new StockCard;
        $return -> status = "RETURN";
        $return -> stockName = $stockname;
        $return -> customerName = $customername;
        $return -> stockQuantityReturn = $stockquantityreturn;
        $return -> comments = $comments;
        $return -> product_id = $productid;
        //$stockin->save();

        $product = Product::where('name',$stockname)->first();

        if($product){
            $product->returns += $stockquantityreturn;
            
        }else if(!$product){
            return response([
                'error' => 'Not Found'
            ], 404);
        }

        $return->stockBalance = $product->quantity;
        $return->save();
        $product->save();
        return response()->json([
            'stockhistory' => $return
        ]);
    }
}
