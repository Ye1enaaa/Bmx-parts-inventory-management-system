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

    public function returnUnderStocksAPI(){
        $stocks = Product::where('quantity', '<', 10)->get();
        return response()->json([
            'understock' => $stocks
        ]);
    }
}
