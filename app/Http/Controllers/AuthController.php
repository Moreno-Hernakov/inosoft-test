<?php

namespace App\Http\Controllers;

use App\serviceRepository\services\authService;

class AuthController extends Controller
{

    public function __construct() {
        $this->authService = new authService();
    }

    public function register(){

        $data = request()->validate([
			'name'=>'required|min:3',
			'email'=>'required|email',
			'password'=>'required|min:3',
			'role'=>'required|in:user,admin',
		],
        [
            'role.in' => 'data must be \'user\' or \'admin\'!',
        ]);

        $data['password'] = bcrypt(request('password'));

        $user = $this->authService->regis($data);

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    public function login(){
        $credentials = request(['email', 'password']);
        
        $auth = $this->authService->attempt($credentials);

        if(!$auth){
            return response()->json(['error' => 'unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $auth,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 3600
        ], 200);
    }

    public function data(){
        $auth = $this->authService->userAuth();
        return response()->json($auth, 200);
    }
    
    public function refresh(){
        return response()->json([
            'access_token' => $this->authService->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 3600
        ], 200);
    }

    public function logout(){
        $this->authService->logout();
        return response()->json([
            "message" => "Successfully logout"
        ], 200);
    }

}

