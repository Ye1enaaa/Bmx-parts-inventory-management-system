<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Str;


//gitandog ni jopin.
class SupplierController extends Controller
{
    public function showSupplierInformation()
    {
        $suppliers = Supplier::with('products')->get();
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
            'address' => 'required|string'
        ]);

        $supplier = Supplier::create([
            'name' => $validateData['name'],
            'email_address' => $validateData['email_address'],
            'contact_number' => $validateData['contact_number'],
            'address' => $validateData['address']
        ]);

        return redirect('/dashboard');
    }
    
}

