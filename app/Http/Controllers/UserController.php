<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;
class UserController extends Controller
{
    //return views
    public function returnCreateAndShowUserView(){
        $users = User::all();
        return view('system-users.create-user',['users'=>$users]);
    }

    public function registerUser(Request $request){
        $dataValidation = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|min:8'
        ]);

        $user = User::create([
            'name'=> $dataValidation['name'],
            'email'=> $dataValidation['email'],
            'password'=> Hash::make($dataValidation['password'])
        ]);

        $user->save();
        return redirect('/createuser');
    }

    public function softDelete($id){
        $user = User::findOrFail($id);
        $user -> delete();

        return redirect('/createuser')->with('Success', 'User has been deleted');
    }

    public function disable($id){
        $user = User::findOrFail($id);
        $user -> disabled = true;
        $user -> save();

        return redirect('/createuser')->with('Success', 'User has been disabled');
    }
}
