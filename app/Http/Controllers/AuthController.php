<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('pages.register');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect('/login');
    }
    public function loginForm()
    {
        return view('pages.login');
    }
    public function login(Request $request)
    {   
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $result = Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);
        if($result){
            return redirect('/');
        }
        return redirect()->back()->with('status', 'Wrong email or password!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
