<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            'name' => 'required|string|min:3|max:50|unique:users',
            'email' => 'email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'confirmed|min:6'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('users')->ignore($user->id)
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'phone' => [
                'required',
                Rule::unique('users')->ignore($user->id)
            ]
        ]);  
        $fields = $request->all();

        if(!isset($fields['status'])) $fields['status'] = null;

        if(!isset($fields['is_admin'])) $fields['is_admin'] = null;

        $user->edit($fields);

        $user->generatePassword($request->get('password'));

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        
    }
}
