<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class UnderStockController extends Controller
{
    //
    public function returnUnderStocks(){
        $stocks = Product::where('quantity', '<', 10)->get();
        return view('understock.understock', compact('stocks'));
    }
}
