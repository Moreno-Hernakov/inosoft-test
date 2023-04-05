<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;

class MobilController extends Controller
{
    public function index(){
        return response()->json(Mobil::all(), 200);
    }

    public function show($id){
        return response()->json(Mobil::find($id), 200);
    }

    public function store(){
        $data = request()->validate([
			'mesin'=>'required',
			'kapasitas'=>'required|numeric',
			'tipe'=>'required',
			'stok'=>'required|numeric',
			'kendaraan_id'=>'required'
		]);

        Mobil::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Mobil berhasil ditambahkan',
            'data' => $data
        ], 200);
    }

    public function update(){
        $data = request()->validate([
			'mesin'=>'required',
			'kapasitas'=>'required|numeric',
			'tipe'=>'required',
			'stok'=>'required|numeric',
			'kendaraan_id'=>'required'
		]);

        Mobil::where('_id', request('id'))->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Mobil berhasil diperbarui',
            'data' => $data
        ], 200);
    }

    public function destroy($id){
        Mobil::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'Mobil berhasil dihapus',
        ], 200);
    }
}
