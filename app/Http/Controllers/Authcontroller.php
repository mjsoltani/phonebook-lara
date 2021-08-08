<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = Auth()->attempt(
            [
                'name' => $request->name,
                'password' => $request->password
            ]);
        if (Auth()->check()) {
            return response()->json(['token'=>Auth()->user()->generateToken()]);
        }
        return response()->json(['error'=>'اطلاعات کاربری اشتباه وارد شده است'],401);
    }

    public function logout()
    {
        $user = Auth()->guard()->user();
        $user->logout();
        return $user;
    }
}
