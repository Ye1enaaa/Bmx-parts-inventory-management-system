<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class AdminController extends Controller
{
    //views
    public function returnAdminLoginView(){
        return view('auth-admin.login-admin');
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
}
