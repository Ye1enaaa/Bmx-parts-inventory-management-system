<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\StockCard;
use App\Models\Product;
use View;

class StockcardController extends Controller
{
    public function convertToPDF($id)
    {
        $stockcard = Product::with('stockcard')->findOrFail($id);
        $stockName = $stockcard->name;
        if (!is_null($stockcard)) {
            // Create a new view instance without the "Convert to PDF" button
            $pdfView = View::make('card.stockcard', compact('stockcard'))->with('noPrintButton', true);

            // Generate the PDF using the modified view
            $pdf = PDF::loadHtml($pdfView);

            $pdf->setPaper('landscape');

            // Download the PDF
            return $pdf->download($stockName.'.pdf');
        } else {
            abort(404, 'Not Found');
        }
    }
}
