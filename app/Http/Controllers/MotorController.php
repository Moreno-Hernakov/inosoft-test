<?php

namespace App\Http\Controllers;

use App\serviceRepository\services\motorService;

class motorController extends Controller
{
    public function __construct() {
        $this->motorService = new motorService();
    }

    public function index(){
        $motor = $this->motorService->getmotor();
        return response()->json($motor, 200);
    }

    public function show($id){
        try {
            $this->motorService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "motor ".$id." tidak ada"
            ], 401);
        }
        
        $motor = $this->motorService->getById($id);
        return response()->json($motor, 200);
    }

    public function store(){
        $data = request()->validate([
			'mesin'=>'required',
			'tipe_suspensi'=>'required',
			'tipe_transmisi'=>'required|string',
			'stok'=>'required|numeric',
			'kendaraan_id'=>'required'
		]);

        $motor = $this->motorService->createmotor($data);

        return response()->json([
            'success' => true,
            'message' => 'motor berhasil ditambahkan',
            'data' => $motor
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

        $id = request('id');

        try {
            $this->motorService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "motor ".$id." tidak ada"
            ], 401);
        }

        $this->motorService->updatemotor($id, $data);

        $motor = $this->motorService->getById($id);

        return response()->json([
            'success' => true,
            'message' => 'motor berhasil diperbarui',
            'data' => $motor
        ]);
    }

    public function destroy($id){
        try {
            $this->motorService->getById($id);
        } catch (\Throwable $th) {
            return response()->json([
                "message"=> "motor ".$id." tidak ada"
            ], 401);
        }

        $this->motorService->deletemotor($id);
        return response()->json([
            'success' => true,
            'message' => 'motor berhasil dihapus',
        ]);
    }
}
