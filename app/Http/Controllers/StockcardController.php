<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\StockCard;
use App\Models\Product;

class StockcardController extends Controller
{
    public function convertToPDF($id)
    {
        //$id = 1;
        $stockcard = Product::with('stockcard')->findOrFail($id);
        $stockName = $stockcard->name;
<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
        if(!is_null($stockcard)){
            $pdf = PDF::loadView('card.stockcard', compact('stockcard'));
            return $pdf->download($stockName.'.pdf');
        }else{
            abort(404,'Not Found');
        }
    }
}
