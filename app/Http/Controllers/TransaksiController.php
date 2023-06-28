<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;

class TransaksiController extends Controller
{

    public function index()
    {
        $transaksi = transaksi::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data transaksi',
            'data' => $transaksi
        ], 200);
    }

    public function show($id)
    {
        $transaksi = transaksi::find($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail data transaksi',
            'data' => $transaksi
        ], 200);
    }

    public function store(Request  $request)
    {
        $transaksi = transaksi::create([
            'pasien_id' => $request->pasien_id,
            'total_harga' => $request->total_harga,
            'keterangan' => $request->keterangan,
        ]);

        if ($transaksi){
            return response()->json([
                'success' => true,
                'message' => 'transaksi berhasil di tambahkan',
                'data' => $transaksi
            ],200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'transaksi gagal di tambahkan',
                'data' => $transaksi
            ],409);
        }
    }

    public function update(Request $request, transaksi $transaksi)
    {
        $update = $transaksi->update([
            'pasien_id' => $request->pasien_id,
            'total_harga' => $request->total_harga,
            'keterangan' => $request->keterangan,
        ]);

        if ($update) {
            return response()->json([
                'success' => true,
                'message' => 'obat berhasil di update',
                'data' => $transaksi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'obat gagal di update',
                'data' => $transaksi
            ], 409);
        }
    }

    public function destroy($id)
    {
        $transaksi = transaksi::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'obat berhasil di hapus',
            'data' => $transaksi
        ], 200);
    }


}
