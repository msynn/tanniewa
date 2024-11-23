<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan; // Pastikan model ini ada

class PesananController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'deskripsi' => 'required|string',
        ]);

        // Simpan ke database
        $pesanan = new Pesanan();
        $pesanan->nama = $request->input('nama');
        $pesanan->email = $request->input('email');
        $pesanan->phone = $request->input('phone');
        $pesanan->deskripsi = $request->input('deskripsi');
        $pesanan->save();

        return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
    }
}
