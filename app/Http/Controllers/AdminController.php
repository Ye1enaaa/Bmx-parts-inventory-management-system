<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Models\Product;
use App\Models\User;
use App\Models\Supplie;
use App\Models\StockCard;
class AdminController extends Controller
{

    public function index()
    {
        return view('dashboard.dashboard');
    }

    //views
    public function returnAdminLoginView(){
        return view('auth-admin.login-admin');          
    }

    public function returnAdminDashboardView(){
        $count = DB::table('stock_cards')->sum('stockQuantityIssued'); // total Stock Outs
        $user = Auth::user();
        $total_quantity = DB::table('products')->sum('quantity'); // total stock on hand
        $total_inventory = DB::table('products')->sum('inventory_value'); //total price of stocks
        $total_admin = DB::table('suppliers')->count(); //count suppliers
        return view('dashboard.data-table',[
            'count' => $count,
            'total_quantity'=> $total_quantity,
            'total_inventory'=> $total_inventory,
            'total_admin'=> $total_admin
        ]);

    }

    public function returnStocksOutByData() {
        $stockOutsPerDay = DB::table('stock_cards')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as day, SUM(stockQuantityIssued) as total'))
            ->groupBy('day')
            ->get();
        return view('graphs.sales', ['stockOutsPerDay' => $stockOutsPerDay]);
    }

    
    //For mobile
    public function returnDashboardMobileView(){
        $count = DB::table('products')->count();
        $total_quantity = DB::table('products')->sum('quantity');
        $total_inventory = DB::table('products')->sum('inventory_value');
        $total_value = DB::table('customer_orders')->sum('total_value');
        $total_admin = DB::table('suppliers')->count();

        return response([
            'product_count' => $count,
            'products_quantity' => $total_quantity,
            'inventory_value' => $total_inventory,
            'orders_value' => $total_value,
            'admin_count' => $total_admin
        ]);
    }


}