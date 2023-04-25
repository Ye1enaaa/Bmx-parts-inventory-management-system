<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
}
