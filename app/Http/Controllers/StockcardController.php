<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;



class StockcardController extends Controller
{
    public function convertToPDF()
    {
        $stockcard = // Fetch or pass the data for the stock card here

        $pdf = PDF::loadView('stockcard', compact('stockcard'));
        return $pdf->download('stockcard.pdf');
    }
}
