<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatRequst;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $user = User::all();
        return $user;
    }

    public function show(Request $request, $user)
    {
        $user =User::query()->findOrFail($user);
        return $user;
    }

    public function create(CreatRequst $request)
    {
        User::query()->create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>$request->password,
        ]);
        return response()->json('created');
    }

    public function edit(CreatRequst $request, $user)
    {
        $user = User::query()->findOrFail($user);
        $data = $request->all();
        $user->update($data);
        //response
        return response()->json('created');
    }

    public function delete($user)
    {
        $user = User::query()->findOrFail($user);
        $user->delete();
        //response
        return response()->json('deleted');
    }
}
