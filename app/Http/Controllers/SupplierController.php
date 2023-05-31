<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplie;
use Illuminate\Support\Str;


//gitandog ni jopin.
class SupplierController extends Controller
{
    public function showSupplierInformation()
    {
        $suppliers = Supplie::with('products')->get();
        return view('supplier.supplier-information', compact('suppliers'));
    }

    public function showAddSupplierForm()
    {
        return view('supplier.add-supplier');
    }

    public function addSupplier(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string',
            'email_address' => 'required|string',
            'contact_number' => 'required|string|max:11',
            'desc' => 'required|string'
        ]);

        $supplier = Supplie::create([
            'name' => $validateData['name'],
            'email_address' => $validateData['email_address'],
            'contact_number' => $validateData['contact_number'],
            'desc' => $validateData['desc']
        ]);

        return redirect('/dashboard');
    }
    
}

