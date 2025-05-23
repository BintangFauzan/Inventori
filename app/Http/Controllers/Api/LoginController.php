<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use http\Client\Curl\User;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function construct(){
        $this->middleware("auth:api", ["except"=>["login","register"]]);
    }
    //login
    public function login(Request $request){
        $validator=Validator::make($request->all(),
        [
           'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }
        $cridentials = $request->only('email', 'password');
        if(!Auth::attempt($cridentials)){
            return response()->json([
                "message" => "Unauthorized",
                'status' => 'error'
            ],401);
        }
        $user = Auth::user();
        $token = $user->createToken('AuthToken')->plainTextToken;

        if(!$token){
            return response()->json([
                "message" => "Unauthorized",
                'status' => "error"
            ], 401);
        }
        $user = Auth::user();
        return response()->json([
            'status'=>'succes',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }
    //Register
    public function register(Request $request){
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
            ],
                [
                    'name.required' => "Name is required",
                    'email.required' => "Email is required",
                    'password.required' => "Password is required",
                ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            $token = $user->createToken('AuthToken')->plainTextToken;
            return response()->json([
                'status'=>'succes',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        } catch (\exception $e) {
            return response()->json([
                'status'=>'failed',
                'message' => "gagal registrasi",
                'error' => $e->getMessage()
            ]);
        }
    }
    public function userDetails()
    {
        return response()->json(auth()->user());
    }
}
