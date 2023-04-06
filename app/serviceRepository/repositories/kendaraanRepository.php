<?php  
namespace App\serviceRepository\repositories;

use App\Models\Kendaraan;

Class kendaraanRepository {
    public function getAll(){
        $kendaraan = Kendaraan::all();
        return $kendaraan;
    }

    public function getById($id){
        $kendaraan = Kendaraan::findOrFail($id);
        return $kendaraan;
    }

    public function create($data){
        $kendaraan = Kendaraan::create($data);
        return $kendaraan;
    }

    public function update($id, $data){
        $kendaraan = Kendaraan::where('_id',$id)->update($data);
        return $kendaraan;
    }

    public function delete($id){
        $kendaraan = Kendaraan::destroy($id);
        return $kendaraan;
    }
}