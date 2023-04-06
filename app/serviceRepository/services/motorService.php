<?php  
namespace App\serviceRepository\services;

use App\serviceRepository\repositories\motorRepository;

Class motorService {

    public function __construct(){
        $this->motorRepository = new motorRepository();
    }

    public function getmotor(){
        $motor = $this->motorRepository->getAll();
        return $motor;
    }

    public function getById($id){
        $motor = $this->motorRepository->getById($id);
        return $motor;
    }
    
    public function createmotor($data){
        $motor = $this->motorRepository->create($data);
        return $motor;
    }

    public function updatemotor($id, $data){
        $motor = $this->motorRepository->update($id, $data);
        return $motor;
    }

    public function deletemotor($id){
        $motor = $this->motorRepository->delete($id);
        return $motor;
    }

}