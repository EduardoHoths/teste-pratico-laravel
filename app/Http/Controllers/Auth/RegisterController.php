<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function show()
    {
        return view("auth.register");
    }

    public function create(RegisterRequest $request)
    {


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => 'default.png'
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }
}
