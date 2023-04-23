<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
//use Auth;
use Validator;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)){
            $user_role = Auth::user()->role;

            switch($user_role){
                case 1:
                    return redirect('/createuser');
                    break;
                case 2:
                    return redirect('/dashboard');
                    break;
                case 3:
                    return redirect('/customer');
                    break;
                default:
                    Auth::logout();
                    return redirect('/login')-with('error','something went wrong');
            }
        }else{
            return redirect('/login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
//mobile
    public function loginMobile(Request $request)
    {
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

        $user = User::where('email', $input['email'])->first();

        if (!$user || !Hash::check($input['password'], $user->password)) {
            return response([
                'message' => "Your email or password is incorrect. Please try again."
            ], 401);
        }

        $token = $user->createToken('secret')->plainTextToken;


        return response([
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function user(Request $request)
    {
        return response([
            'user' => auth()->user()
        ], 200);
    }

    public function logoutMobile(Request $request){
        Auth::logout();
        return response([
            'msg' => 'Logout'
        ]);
    }
}
