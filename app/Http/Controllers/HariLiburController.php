<?php

namespace App\Http\Controllers;

use App\Models\HariLibur;
use App\Models\Instansi;
use App\Models\Tapel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HariLiburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hariLibur = HariLibur::all();
        return view('instansi.main', compact('hariLibur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tapel = Tapel::all();
        $instansi = Instansi::where('id', 3); //nanti diubah agar instansi yang muncul sesuai dengan instansi nya operator
        return view('instansi.create', compact('tapel', 'instansi'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();


        $validate = Validator::make($request->all(), [
            'tapel_id' => 'required|exists:tapels,id',
            'instansi_id' => 'required|exists:instansis,id',
            'keterangan' => 'required|string',
            'tanggal' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('instansi.create')->withErrors($validate)->withInput();
        }

        $instansiOperator = $user->instansi()->where('instansi_id', $request->instansi_id)->first();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
