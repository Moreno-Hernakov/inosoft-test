<?php  
namespace App\serviceRepository\services;

use App\serviceRepository\repositories\kendaraanRepository;

Class kendaraanService {

    public function __construct(){
        $this->kendaraanRepository = new kendaraanRepository();
    }

    public function getKendaraan(){
        $kendaraan = $this->kendaraanRepository->getAll();
        return $kendaraan;
    }

    public function getById($id){
        $kendaraan = $this->kendaraanRepository->getById($id);
        return $kendaraan;
    }
    
    public function createKendaraan($data){
        $kendaraan = $this->kendaraanRepository->create($data);
        return $kendaraan;
    }

    public function updateKendaraan($id, $data){
        $kendaraan = $this->kendaraanRepository->update($id, $data);
        return $kendaraan;
    }

    public function deleteKendaraan($id){
        $kendaraan = $this->kendaraanRepository->delete($id);
        return $kendaraan;
    }

}