<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthController extends Controller
{
    public function register(){

        $data = request()->validate([
			'name'=>'required|min:3',
			'email'=>'required|email',
			'password'=>'required|min:3',
		]);

        $data['password'] = bcrypt(request('password'));

        $user = User::create($data);

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function login(){
        $credentials = request(['email', 'password']);
        $auth = auth()->attempt($credentials);
        if(!$auth){
            return response()->json(['error' => 'unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $auth,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 3600
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ], 200);
    }

    public function data(){
        return response()->json(auth()->user(), 200);
    }
    
    public function refresh(){
        return response()->json([
            'access_token' => auth()->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 3600
        ], 200);
    }

    public function logout(){
        auth()->logout();
        return response()->json([
            "message" => "Successfully logout"
        ], 200);
    }

}

