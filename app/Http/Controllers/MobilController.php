<?php

namespace App\Http\Controllers;

use App\serviceRepository\services\mobilService;

class mobilController extends Controller
{
    public function __construct() {
        $this->mobilService = new mobilService();
    }

    public function index(){
        $mobil = $this->mobilService->getmobil();
        return response()->json($mobil, 200);
    }

    public function show($id){
        try {
            $this->mobilService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "mobil ".$id." tidak ada"
            ], 401);
        }

        $mobil = $this->mobilService->getById($id);
        return response()->json($mobil, 200);
    }

    public function store(){
        $data = request()->validate([
			'mesin'=>'required',
			'kapasitas'=>'required|numeric',
			'tipe'=>'required',
			'stok'=>'required|numeric',
			'kendaraan_id'=>'required'
		]);

        $mobil = $this->mobilService->createmobil($data);

        return response()->json([
            'success' => true,
            'message' => 'mobil berhasil ditambahkan',
            'data' => $mobil
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

        $id = request('id');

        try {
            $this->mobilService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "mobil ".$id." tidak ada"
            ], 401);
        }

        $this->mobilService->updatemobil($id, $data);

        $mobil = $this->mobilService->getById($id);

        return response()->json([
            'success' => true,
            'message' => 'mobil berhasil diperbarui',
            'data' => $mobil
        ]);
    }

    public function destroy($id){
        try {
            $this->mobilService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "mobil ".$id." tidak ada"
            ], 401);
        }

        $this->mobilService->deletemobil($id);
        return response()->json([
            'success' => true,
            'message' => 'mobil berhasil dihapus',
        ]);
    }
}
