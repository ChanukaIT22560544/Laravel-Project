<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%')
                  ->orWhere('bdy', 'like', '%' . $search . '%');
        })->get();
    
        return view('index', compact('users', 'search'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'bdy' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required',
            'bdy' => 'required',
        ]);

        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}