<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pasien;

class PasienController extends Controller
{
    //Make REST API HTTP Request
    public function index()
    {
        $pasien = pasien::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data pasien',
            'data' => $pasien
        ], 200);
    }

    public function show($id)
    {
        $pasien = pasien::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail data pasien',
            'data' => $pasien
        ], 200);
    }

    public function store(Request $request)
    {
        $pasien = pasien::create([
            'nama_pasien' => $request->nama_pasien,
            'alamat_pasien' => $request->alamat_pasien,
            'no_telp_pasien' => $request->no_telp_pasien,
        ]);

        if ($pasien) {
            return response()->json([
                'success' => true,
                'message' => 'pasien berhasil di tambahkan',
                'data' => $pasien
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'pasien gagal di tambahkan',
                'data' => $pasien
            ], 409);
        }
    }

    public function update(Request $request, pasien $pasien)
    {
        $update = $pasien->update([
            'nama_pasien' => $request->nama_pasien,
            'alamat_pasien' => $request->alamat_pasien,
            'no_telp_pasien' => $request->no_telp_pasien,
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'data pasien berhasil di update',
                'data' => $pasien
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data pasien gagal di update',
                'data' => $pasien
            ], 409);
        }
    }

    public function destroy($id)
    {
        $pasien = pasien::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'data pasien berhasil di hapus',
            'data' => $pasien
        ], 200);
    }
}
