<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplie;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    public function returnSupplierViewPage()
{
    $suppliers = Supplie::with('products')->get();
    $addSupplierView = view('supplier.add-supplier');
    
    return view('supplier.supplier-information', compact('suppliers', 'addSupplierView'));
}


    public function showAdminDashboard()
    {
        return view('dashboard.admin');
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
        $supplier->save();}

}
