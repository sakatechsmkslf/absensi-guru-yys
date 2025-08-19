<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresensiController extends Controller
{
    public function viewPresensi()
    {
        // $instansi = auth()->user()->instansi()->get(['latitude', 'longitude']);
        // return view('tesPresensi.index', compact('instansi'));
        return view('tesPresensi.index');

    }
}
