<?php  
namespace App\serviceRepository\services;

use App\serviceRepository\repositories\transaksiRepository;

Class transaksiService {

    public function __construct(){
        $this->transaksiRepository = new transaksiRepository();
    }
    // for user ============================
    public function createTransaksi($data){
        $transaksi = $this->transaksiRepository->create($data);
        return $transaksi;
    }

    public function getTransUser(){
        $transaksi = $this->transaksiRepository->getTransUser();
        return $transaksi;
    }

    public function findTransUser($id){
        $transaksi = $this->transaksiRepository->findTransUser($id);
        return $transaksi;
    }

    // for admin ===========================
    public function getTransJenis($jenis){
        $transaksi = $this->transaksiRepository->getTransJenis($jenis);
        return $transaksi;
    }

    public function getTransaksi(){
        $transaksi = $this->transaksiRepository->getAll();
        return $transaksi;
    }

    public function getById($id){
        $transaksi = $this->transaksiRepository->getById($id);
        return $transaksi;
    }

    public function updateTransaksi($id, $data){
        $transaksi = $this->transaksiRepository->update($id, $data);
        return $transaksi;
    }

    public function deletetransaksi($id){
        $transaksi = $this->transaksiRepository->delete($id);
        return $transaksi;
    }

}