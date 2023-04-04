<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //views
    public function index(){
        $product = Product::all();
        return view('liquor-data.show', compact('product'));
    }

    public function returnCreateDataView(){
        return view('liquor-data.create');
    }

    //post Liquor Data

    public function storeData(Request $request){
        $number = mt_rand(1000000000,9999999999);

        $request['product_code'] = $number;
        if($this->productCodeExists($number)){
            $number = mt_rand(1000000000,9999999999);
        }

        $unit_price = $request['unit_price'];
        $quantity = $request['quantity'];

        $request['inventory_value'] = $unit_price * $quantity; 

        Product::create($request->all());

        return redirect('/index');
    }

    public function productCodeExists($number){
        return Product::whereProductCode($number)->exists();
    }
}
