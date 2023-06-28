<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\obat;

class ObatController extends Controller
{
    
    public function index()
    {
        $obat = obat::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data obat',
            'data' => $obat
        ], 200);
    }

    public function show($id)
    {
        $obat = obat::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail data obat',
            'data' => $obat
        ], 200);
    }

    public function store(Request $request)
    {
        $obat = obat::create([
            'nama_obat' => $request->nama_obat,
            'harga_obat' => $request->harga_obat,
            'stok_obat' => $request->stok_obat,
        ]);

        if ($obat) {
            return response()->json([
                'success' => true,
                'message' => 'obat berhasil di tambahkan',
                'data' => $obat
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'obat gagal di tambahkan',
                'data' => $obat
            ], 409);
        }
    }

    public function update(Request $request, obat $obat)
    {
        $update = $obat->update([
            'nama_obat' => $request->nama_obat,
            'harga_obat' => $request->harga_obat,
            'stok_obat' => $request->stok_obat,
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'obat berhasil di update',
                'data' => $obat
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'obat gagal di update',
                'data' => $obat
            ], 409);
        }
    }

    public function destroy($id)
    {
        $obat = obat::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'obat berhasil di hapus',
            'data' => $obat
        ], 200);
    }

}
