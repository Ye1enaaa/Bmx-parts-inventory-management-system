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
use App\Models\CustomerOrder;

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
    public function returnPurchaseView(){
        $customerOrders = CustomerOrder::with('user')->get();
        return view('purchase.purchase-order',[
            'customerOrders' => $customerOrders
        ]);
    }

    public function returnAdminDashboardView(){
        $count = DB::table('products')->count();
        $user = Auth::user();
        // Retrieve the orders associated with the authenticated user and join the users table to include the user's name;
        $customerOrders = CustomerOrder::with('user')->get();


        $total_quantity = DB::table('products')->sum('quantity');
        $total_inventory = DB::table('products')->sum('inventory_value');
        $total_value = DB::table('customer_orders')->sum('total_value');
        $total_admin = DB::table('admins')->count();
        return view('dashboard.data-table',[
            'count' => $count,
            'customerOrders' => $customerOrders,
            'total_quantity'=> $total_quantity,
            'total_inventory'=> $total_inventory,
            'total_value' => $total_value,
            'total_admin'=> $total_admin
        ]);
    }

    //auth
    public function loginAdmin(Request $request){
        $input = $request->all();

        
        $validate = Validator::make($input, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $admin = Admin::where('email', $input['email'])->first();

        if (!$admin || !Hash::check($input['password'], $admin->password)) {
            return response([
                'message' => "Your email or password is incorrect. Please try again."
            ], 401);
        }

        return redirect('/index');
    }

    public function registeradmin(Request $request)
    {
        //validation of fields
        $attrs = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        //create user
        $admin = Admin::create([
            'email'=> $attrs['email'],
            'password'=> bcrypt($attrs['password'])
        ]);

        //return user and token
        $token = $admin->createToken('secret')->plainTextToken;
        return response([
            'user'=> $admin,
            'token' => $token
        ]);
    }
    
    //For mobile
    public function returnDashboardMobileView(){
        $count = DB::table('products')->count();
        $total_quantity = DB::table('products')->sum('quantity');
        $total_inventory = DB::table('products')->sum('inventory_value');
        $total_value = DB::table('customer_orders')->sum('total_value');
        $total_admin = DB::table('admins')->count();

        return response([
            'product_count' => $count,
            'products_quantity' => $total_quantity,
            'inventory_value' => $total_inventory,
            'orders_value' => $total_value,
            'admin_count' => $total_admin
        ]);
    }
}

