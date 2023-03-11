<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:3|max:50',
            'email' => 'email',
            'phone' => 'required|unique:users',
            'password' => 'confirmed|min:6'
        ]);
    
        $fields = $request->all();

        $fields['password'] = User::generatePassword($request->get('password'));

        User::add($fields);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
