<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resep_obat;

class ResepController extends Controller
{
    
    public function index()
    {
        $resep_obat = resep_obat::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data resep_obat',
            'data' => $resep_obat
        ], 200);
    }

    public function show($id)
    {
        $resep_obat = resep_obat::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail data resep_obat',
            'data' => $resep_obat
        ], 200);
    }

    public function store(Request $request)
    {
        $resep_obat = resep_obat::create([
            'obat_id' => $request->obat_id,
            'pasien_id' => $request->pasien_id,
            'keterangan' => $request->keterangan,
        ]);

        if ($resep_obat) {
            return response()->json([
                'success' => true,
                'message' => 'resep_obat berhasil di tambahkan',
                'data' => $resep_obat
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'resep_obat gagal di tambahkan',
                'data' => $resep_obat
            ], 409);
        }
    }

    public function update(Request $request, resep_obat $resep_obat)
    {
        $update = $resep_obat->update([
            'obat_id' => $request->obat_id,
            'pasien_id' => $request->pasien_id,
            'keterangan' => $request->keterangan,
        ]);

        if ($resep_obat) {
            return response()->json([
                'success' => true,
                'message' => 'data resep_obat berhasil di update',
                'data' => $resep_obat
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data resep_obat gagal di update',
                'data' => $resep_obat
            ], 409);
        }
    }

    public function destroy($id)
    {
        $resep_obat = resep_obat::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data resep_obat berhasil di hapus',
            'data'    => $resep_obat
        ], 200);
    }


}
