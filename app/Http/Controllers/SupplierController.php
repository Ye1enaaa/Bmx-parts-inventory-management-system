<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplie;
class SupplierController extends Controller
{
    public function returnSupplierViewPage(){
        return view('supplier.supplier');
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
            'contact_number'=>$validateData['contact_number'],
            'desc'=>$validateData['desc']
        ]);

        $supplier->save();
    }
}
