<?php  
namespace App\serviceRepository\services;

use App\serviceRepository\repositories\mobilRepository;

Class mobilService {

    public function __construct(){
        $this->mobilRepository = new mobilRepository();
    }

    public function getmobil(){
        $mobil = $this->mobilRepository->getAll();
        return $mobil;
    }

    public function getById($id){
        $mobil = $this->mobilRepository->getById($id);
        return $mobil;
    }
    
    public function createmobil($data){
        $mobil = $this->mobilRepository->create($data);
        return $mobil;
    }

    public function updatemobil($id, $data){
        $mobil = $this->mobilRepository->update($id, $data);
        return $mobil;
    }

    public function deletemobil($id){
        $mobil = $this->mobilRepository->delete($id);
        return $mobil;
    }

}