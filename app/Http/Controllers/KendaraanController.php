<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function index(){
        return response()->json(Kendaraan::all(), 200);
    }

    public function show($id){
        return response()->json(Kendaraan::find($id), 200);
    }

    public function store(){
        $data = request()->validate([
			'tahun_keluar'=>'required',
			'warna'=>'required|string',
			'harga'=>'required|numeric',
		]);

        Kendaraan::create($data);

        return response()->json([
            'success' => true,
            'message' => 'kendaraan berhasil ditambahkan',
            'data' => $data
        ], 200);
    }

    public function update(){
        $data = request()->validate([
			'tahun_keluar'=>'required',
			'warna'=>'required|string',
			'harga'=>'required|numeric',
		]);

        Kendaraan::where('_id', request('id'))->update($data);

        return response()->json([
            'success' => true,
            'message' => 'kendaraan berhasil diperbarui',
            'data' => $data
        ]);
    }

    public function destroy($id){
        Kendaraan::destroy($id);
        return response()->json([
            'success' => true,
            'message' => 'kendaraan berhasil dihapus',
        ]);
    }
}
