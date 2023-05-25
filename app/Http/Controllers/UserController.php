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
        return view('system-users.superadmin',['users'=>$users]);
    }

    public function registerUser(Request $request){
        $dataValidation = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|min:8',
            'image' => 'nullable|image|mimes:jpeg,jpg,png',
            'role' => 'required'
        ]);

        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('user_profile', 'public');
        }

        $user = User::create([
            'name'=> $dataValidation['name'],
            'email'=> $dataValidation['email'],
            'password'=> Hash::make($dataValidation['password']),
            'role' => $dataValidation['role'],
            'image' => $imagePath
        ]);

        $user->save();
        return redirect('/createuser');
    }

    //EDIT
    public function editUser(Request $request, $id){
        $userFind = User::find($id);
        $userFind->name = $request->input('name');
        $userFind->password = Hash::make($request->input('password'));
        $userFind->save();

        return redirect('/createuser');
    }



    // public function editUser(Request $request){
    //     $userId = $request->input('user_id');
    //     $userFind = User::find($userId);
    //     $userFind->name = $request->input('name');
    //     $userFind->password = Hash::make($request->input('password'));
    //     $userFind->save();

    //     return redirect('/createuser');
    // }








    //Check if active or not??

    public function isActive($id){
        $user = User::find($id);

        
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

    public function userAllMobile(){
        $user = User::all();
        return response([
            'user' => $user
        ]);
    }

    public function user(){
        return response([
            'user' => auth()->user()
        ]);
    }
}
