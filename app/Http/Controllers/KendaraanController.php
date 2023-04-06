<?php

namespace App\Http\Controllers;

use App\serviceRepository\services\kendaraanService;

class KendaraanController extends Controller
{
    public function __construct() {
        $this->kendaraanService = new kendaraanService();
    }

    public function index(){
        $kendaraan = $this->kendaraanService->getKendaraan();
        return response()->json($kendaraan, 200);
    }

    public function show($id){
        try {
            $this->kendaraanService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "kendaraan ".$id." tidak ada"
            ], 401);
        }
        $kendaraan = $this->kendaraanService->getById($id);
        return response()->json($kendaraan, 200);
    }

    public function store(){
        $data = request()->validate([
			'tahun_keluar'=>'required',
			'warna'=>'required|string',
			'harga'=>'required|numeric',
		]);

        $kendaraan = $this->kendaraanService->createKendaraan($data);

        return response()->json([
            'success' => true,
            'message' => 'kendaraan berhasil ditambahkan',
            'data' => $kendaraan
        ], 200);
    }

    public function update(){
        $data = request()->validate([
			'tahun_keluar'=>'required',
			'warna'=>'required|string',
			'harga'=>'required|numeric',
		]);

        $id = request('id');

        try {
            $this->kendaraanService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "kendaraan ".$id." tidak ada"
            ], 401);
        }

        $this->kendaraanService->updateKendaraan($id, $data);

        $kendaraan = $this->kendaraanService->getById($id);

        return response()->json([
            'success' => true,
            'message' => 'kendaraan berhasil diperbarui',
            'data' => $kendaraan
        ]);
    }

    public function destroy($id){
        try {
            $this->kendaraanService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "kendaraan ".$id." tidak ada"
            ], 401);
        }

        $this->kendaraanService->deleteKendaraan($id);
        return response()->json([
            'success' => true,
            'message' => 'kendaraan berhasil dihapus',
        ]);
    }
}
