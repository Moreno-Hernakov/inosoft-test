<?php

namespace App\Http\Controllers;

use App\serviceRepository\services\transaksiService;
use App\serviceRepository\services\mobilService;
use App\serviceRepository\services\motorService;

class TransaksiController extends Controller
{
    // for user

    public function __construct() {
        $this->transaksiService = new transaksiService();
        $this->motorService = new motorService();
        $this->mobilService = new mobilService();
    }
    
    public function store(){
        $data = request()->validate([
            'jenis'=>'required|in:mobil,motor',
			'jumlah'=>'required|numeric',
			'keterangan'=>'required',
			'barang_id'=>'required'
		],
        [
            'jenis.in' => 'data must be \'mobil\' or \'motor\'!',
        ]);

        $data['barang_id'] =  new \MongoDB\BSON\ObjectId(request('barang_id'));
        $data['user_id'] = auth()->user()->id;
        $idBarang = request('barang_id');
        $service = $data['jenis'].'Service';

        try {
            $this->$service->getById($idBarang);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> $data['jenis'] .' '.$idBarang." tidak ada"
            ], 401);
        }
        
        $barang = $this->$service->getById($idBarang);

        if($barang->stok < $data['jumlah']){
            return response()->json([
                "message"=> 'stok'.$idBarang." tidak mencukupi"
            ], 401);
        }

        $transaksi = $this->transaksiService->createTransaksi($data);
        $this->$service->updateStok($barang, $data['jumlah']);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil ditambahkan',
            'data' => $transaksi
        ], 200);
    }

    public function getTransUser(){
        $transaksi = $this->transaksiService->getTransUser();
        return response()->json($transaksi, 200);
    }

    public function findTransUser($id){
        
        $transaksi = $this->transaksiService->findTransUser($id);
    
        if($transaksi->isEmpty()){
            return response()->json([
                "message"=> "transaksi anda dengan ".$id." tidak ada"
            ], 401);
        }
        
        return response()->json($transaksi, 200);
    }

    // for admin ===================================================
    public function getTransMotor(){
        $transaksi = $this->transaksiService->getTransJenis('motor');
        return response()->json($transaksi, 200);
    }
    public function getTransMobil(){
        $transaksi = $this->transaksiService->getTransJenis('mobil');
        return response()->json($transaksi, 200);
    }

    public function index(){
        $transaksi = $this->transaksiService->getTransaksi();
        return response()->json($transaksi, 200);
    }

    public function show($id){
        try {
            $transaksi = $this->transaksiService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "transaksi ".$id." tidak ada"
            ], 401);
        }

        return response()->json($transaksi, 200);
    }

    public function update(){
        $data = request()->validate([
            'id'=>'required',
            'jenis'=>'required|in:Mobil,Motor',
			'jumlah'=>'required|numeric',
			'keterangan'=>'required',
			'barang_id'=>'required'
		],
        [
            'jenis.in' => 'data must be \'Mobil\' or \'Motor\'!',
        ]); 

        $id = request('id');

        try {
            $this->transaksiService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "transaksi ".$id." tidak ada"
            ], 401);
        }

        $this->transaksiService->updateTransaksi($id, $data);

        $transaksi = $this->transaksiService->getById($id);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil diperbarui',
            'data' => $data
        ], 200);
    }

    public function destroy($id){
        try {
            $this->transaksiService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "transaksi ".$id." tidak ada"
            ], 401);
        }

        $this->transaksiService->deleteTransaksi($id);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dihapus',
        ], 200);
    }
}
