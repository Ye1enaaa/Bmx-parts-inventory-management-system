<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplie;
use Illuminate\Support\Str;
class SupplierController extends Controller
{
    public function returnSupplierViewPage(){
        $suppliers = Supplie::with('products')->get(); 
        return view('supplier.supplier', compact('suppliers'));
    }
    
    public function showAdminDashboard()
    {
        return view('dashboard.admin');
    }

    public function addSupplier(Request $request){
        $validateData = $request->validate([
            'name'=>'required|string',
            'contact_number'=>'required|string|max:11',
            'desc'=>'required|string'
        ]);

        $supplier = Supplie::create([
            'name'=>$validateData['name'],
            //'suid' => Str::uuid(), //
            'contact_number'=>$validateData['contact_number'],
            'desc'=>$validateData['desc']
        ]);

        $supplier->save();
    }
}
