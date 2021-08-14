<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Authcontroller extends Controller
{
    public function login(LoginRequest  $request)
    {

        if(Auth::attempt($request->only(['name','password']))) {
            return response()->json(['token' => Auth()->user()->generateToken()]);
        }


        return response()->json(['error' => 'اطلاعات کاربری اشتباه وارد شده است']);
    }

    public function logout()
    {
        $user = Auth()->guard()->user();
        $user->logout();
        return $user;
    }
}
