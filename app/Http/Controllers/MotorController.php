<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class MotorController extends Controller
{
    public function index(){
        return response()->json(Motor::all(), 200);
    }

    public function show($id){
        return response()->json(Motor::find($id), 200);
    }

    public function store(){
        $data = request()->validate([
			'mesin'=>'required',
			'tipe_suspensi'=>'required',
			'tipe_transmisi'=>'required|string',
			'stok'=>'required|numeric',
			'kendaraan_id'=>'required'
		]);


        Motor::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Motor berhasil ditambahkan',
            'data' => $data
        ], 200);
    }

    public function update(){
        $data = request()->validate([
			'mesin'=>'required',
			'tipe_suspensi'=>'required',
			'tipe_transmisi'=>'required|string',
			'stok'=>'required|numeric',
			'kendaraan_id'=>'required'
		]);

        Motor::where('_id', request('id'))->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Motor berhasil diperbarui',
            'data' => $data
        ], 200);
    }

    public function destroy($id){
        Motor::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Motor berhasil dihapus',
        ], 200);
    }
}
