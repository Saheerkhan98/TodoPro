<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Hash;
use illuminate\Support\Facades\Validator;



class ApiController extends Controller
{
    public function register (Request $request)
    {
        $validateUser = Validator::make ($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' =>'validation error',
                'errors' =>$validateUser->errors()
            ],401);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Create Successfully',
            'token'=> $user->createToken("API Token")->plainTextToken
        ],200);
    }

    public function login (Request $request)
    {
        $validateUser = Validator::make($request->all(),
        [
            'email' => 'required||email',
            'password' => 'required',
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' =>'validation error',
                'errors' =>$validateUser->errors()
            ],401);
        }

        if(!Auth::attempt($request->only(['email', 'password']))){
            return response()->json([
                'status' => false,
                'message' =>'Email and Password does not match with record'
            ],401);
        }

        $user = User::where('email',$request->email)->first();
        return response()->json([
            'status' => true,
            'message' =>'USer Logged in successfully',
            'token' => $user->createToken("API Token")->plainTexttoken
        ],200);

    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'User logged out successfully',
            'data' =>[],
        ],200);
    }
        
}
