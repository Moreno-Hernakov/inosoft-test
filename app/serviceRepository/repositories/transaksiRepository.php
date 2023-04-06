<?php  
namespace App\serviceRepository\repositories;

use App\Models\transaksi;

Class transaksiRepository {
    // for user ================================
    public function getTransUser(){
        $transaksi = Transaksi::where('user_id', auth()->user()->id)->get();
        return $transaksi;
    }

    public function findTransUser($id){
        $transaksi = Transaksi::where('_id', $id)->where('user_id', auth()->user()->id)->get();
        return $transaksi;
    }

    public function create($data){
        $transaksi = transaksi::create($data);
        return $transaksi;
    }

    // for admin ==============================
    public function getTransJenis($jenis){
        $transaksi = Transaksi::where('jenis', $jenis)->get();
        return $transaksi;
    }

    public function getAll(){
        $transaksi = transaksi::all();
        return $transaksi;
    }

    public function getById($id){
        $transaksi = transaksi::findOrFail($id);
        return $transaksi;
    }

    public function update($id, $data){
        $transaksi = transaksi::where('_id',$id)->update($data);
        return $transaksi;
    }

    public function delete($id){
        $transaksi = transaksi::destroy($id);
        return $transaksi;
    }
}