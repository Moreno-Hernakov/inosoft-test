<?php  
namespace App\serviceRepository\repositories;

use App\Models\User;

Class authRepository {
    
    public function register($data){
        // return $data;
        return User::create($data);
    }
}