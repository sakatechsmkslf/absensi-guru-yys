<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instansi = Instansi::all();
        return view('', compact('instansi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "nama_instansi" => "required|string",
            "kepala_instansi" => "required",
            "alamat_instansi" => "required",
            "telp_instansi" => "required|numeric",
            "user_id" => "exist:user,id|required",
        ]);

        if($validate->fails()){
            return route('instansi.create');
        }

        $instansi = Instansi::create([
            "nama_instansi" => $request->nama_instansi,
            "kepala_instansi" => $request->kepala_instansi,
            "alamat_instansi" => $request->alamat_instansi,
            "telp_instansi" => $request->telp_instansi,
        ]);

        $instansi->user()->attach($request->user_id);

        return redirect()->route('');

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
