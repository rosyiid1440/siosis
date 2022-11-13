<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Alert;
use Auth;

class UserAuthController extends Controller
{
    public function index()
    {
        return view('user/auth/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        $data = User::where('token',$request->token)->first();

        if($data){
            Auth::login($data);
            return redirect('home');
        }else{
            Alert::error('Error', 'Invalid Token !');
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}