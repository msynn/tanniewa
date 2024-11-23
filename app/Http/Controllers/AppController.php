<?php

namespace App\Http\Controllers;

use App\Models\aplications;
use Illuminate\Http\Request;

class AppController extends Controller
{
    // /**
    //  * Menampilkan detail aplikasi berdasarkan ID.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\View\View|\Illuminate\Http\Response
    //  */
    public function show($id)
    {
        // Mengambil aplikasi dari database berdasarkan ID
        $appId = aplications::find($id);

        // Cek jika aplikasi ditemukan
        if (!$appId) {
            // Mengembalikan response 404 jika tidak ditemukan
            return response()->view('errors.404', [], 404);
        }

        // Mengembalikan view dengan data aplikasi
        return view('newApp', compact('appId'));
    }
}
