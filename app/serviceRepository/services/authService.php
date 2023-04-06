<?php  
namespace App\serviceRepository\services;

use App\serviceRepository\repositories\authRepository;

Class authService {

    public function __construct(){
        $this->authRepository = new authRepository();
    }

    // for user
    public function regis($data){
        $auth = $this->authRepository->register($data);
        return $auth;
    }

    public function attempt($data){
        $auth = auth()->attempt($data);
        return $auth;
    }

    public function logout(){
        $auth = auth()->logout();
		return $auth;
    }
    
    public function userAuth(){
        $auth = auth()->user();
		return $auth;
    }

    public function refresh(){
        $auth = auth()->refresh();
		return $auth;
    }

}