<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function signup(){
        return view('registerForm');
    }

    public function createAccount( Request $request ){
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);
        
        $data['password'] = Hash::make($request->password);
        
        $user = User::create($data);
        
        return redirect('signin');
    }
    
    public function signin(){
        return view('loginForm');
    }

    public function loginAUser(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)){
            return redirect()->intended('/');
        }

        return redirect('signin')->with('error', 'Email or password incorrect');
    }

    public function signoutAUser(Request $request){
        Auth::logout();

        return redirect('signin');
    }
}
