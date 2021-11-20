<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:7'
        ]);

        User::create($attributes);

        return response('Registered Successfully.',Response::HTTP_CREATED);
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response([
            'Logged in Successfully.',
            'access_token'=>$token
        ],Response::HTTP_OK);
    }

    public function profile(){
        return response([
            'User Profile.',
            'data'=> auth()->user()
        ],Response::HTTP_OK);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response('Logged out Successfully.',Response::HTTP_OK);
    }
}
