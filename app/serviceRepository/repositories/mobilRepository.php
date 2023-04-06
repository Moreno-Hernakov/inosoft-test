<?php  
namespace App\serviceRepository\repositories;

use App\Models\mobil;

Class mobilRepository {
    public function getAll(){
        $mobil = mobil::all();
        return $mobil;
    }

    public function getById($id){
        $mobil = mobil::findOrFail($id);
        return $mobil;
    }

    public function create($data){
        $mobil = mobil::create($data);
        return $mobil;
    }

    public function update($id, $data){
        $mobil = mobil::where('_id',$id)->update($data);
        return $mobil;
    }

    public function delete($id){
        $mobil = mobil::destroy($id);
        return $mobil;
    }
}