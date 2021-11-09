<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('login');
    }
    public function login(Request $request)
    {
       $cred = $request->only('email','password');

       if(Auth::attempt($cred))
       {
        Alert::toast('Login Success', 'success');  
           return redirect()->route('dashboard');
       }
       Alert::toast('Sorry your email or password is incorrect. Please try again.', 'error');  
        return back();
    }

    public function logout()
    {
        Auth::logout();
        Alert::toast('You have been logged out', 'success');  
        return response()->json([
            'msg'=> 'You have been logged out',
            'status' => 204
        ],204);
    }
}
