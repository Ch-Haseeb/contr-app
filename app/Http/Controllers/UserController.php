<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function register(UserRequest $request, $id)
    {


        $user = User::create(array_merge($request->validated(), [
            'password' => Hash::make($request->input('password')),
            'id' => $id,
        ]));


        return response()->json([
            'user' => $user,
            'message' => 'User created successfully!!'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
    
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
    
        return response()->json(['message' => 'User data updated successfully']);
    }
}
