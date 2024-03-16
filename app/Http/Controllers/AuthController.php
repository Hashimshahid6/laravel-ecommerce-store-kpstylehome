<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        if(!empty(Auth::check()) && Auth::User()->is_admin == 1){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }//
    
    public function authenticate(Request $request){
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1, 'status' => 1, 'is_deleted' => 0], $remember)){
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->back()->with('error', 'Please Enter Email & Password');
        }
    }//

    // public function dashboard(){
    //     $id = Auth::User()->id;
    //     $user = User::find($id);
    //     return view('admin.dashboard', compact('user'));
    // }//

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }//
}