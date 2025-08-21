<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function viewPresensi()
    {
        // $instansi = auth()->user()->instansi()->get(['latitude', 'longitude']);
        // return view('tesPresensi.index', compact('instansi'));
        $user = User::find(3);
        $fotoPresensi = $user->foto_presensi;
        $lokasi = $user->instansi()->get(['latitude', 'longitude', 'nama_instansi']);
        return view('tesPresensi.index', compact('user', 'lokasi', 'fotoPresensi'));

    }
}
