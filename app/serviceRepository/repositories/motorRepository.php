<?php  
namespace App\serviceRepository\repositories;

use App\Models\motor;

Class motorRepository {
    public function getAll(){
        $motor = motor::all();
        return $motor;
    }

    public function getById($id){
        $motor = motor::findOrFail($id);
        return $motor;
    }

    public function create($data){
        $motor = motor::create($data);
        return $motor;
    }

    public function update($id, $data){
        $motor = motor::where('_id',$id)->update($data);
        return $motor;
    }

    public function delete($id){
        $motor = motor::destroy($id);
        return $motor;
    }
}