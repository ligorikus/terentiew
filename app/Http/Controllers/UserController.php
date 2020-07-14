<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.form');
    }

    public function store(UserRequest $request)
    {
        $user = \App\Model\User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' =>  \Illuminate\Support\Facades\Hash::make($request->password)
        ]);
        $role_user = \App\Model\Role::where('name', 'user')->first();
        $user->roles()->attach($role_user);

        return redirect()->route('users.index');
    }
/*
    public function edit(User $user)
    {
        return view('users.form', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('units.index');
    }
*/
    public function delete(User $user)
    {
        return view('users.delete', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
