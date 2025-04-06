<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;


        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $path = public_path('avatars/' . $user->avatar);

            if (file_exists($path) && $user->avatar !== 'default.png') {
                unlink($path);
            }

            $file = $request->file('avatar');
            $filename = uniqid() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('avatars'), $filename);

            $user->avatar = $filename;
        }

        $user->save();

        return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
    }
}
