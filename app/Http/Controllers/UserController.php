<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if(!Auth::attempt($credentials))
            return redirect()->back()->withErrors('Usuário e/ou senha inválidas');

        return redirect('/');

    }

}
