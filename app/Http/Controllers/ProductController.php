<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //views
    public function index(){
        $product = Product::all();
        return view('liquor-data.show', compact('product'));
    }

    public function showAdminDashboard()
    {
        return view('dashboard.admin');
    }


    public function returnCreateDataView(){
        return view('liquor-data.create');
    }

    public function getPrice(Request $request, $selectedValue)
    {
        $price = DB::table('products')->where('name', $selectedValue)->value('unit_price');
        return response()->json(['unit_price' => $price]);
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

    //edit
    public function editData(Request $request,$id){
        $product = Product::findOrFail($id);
        $unit_price = $request['unit_price'];
        $quantity = $request['quantity'];
        $request['inventory_value'] = $unit_price * $quantity; 
        $product->update($request->all());
    }

    public function productCodeExists($number){
        return Product::whereProductCode($number)->exists();
    }
}
