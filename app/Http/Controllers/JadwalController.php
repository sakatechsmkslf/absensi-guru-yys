<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.main', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwal.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all, [
            'tapel_id' => 'required|exists:tapels,id',
            'instansi_id' => 'required|exists:instansis,id',
            'user_id' => 'required|exists:users,id',
            'hari' => 'required',
            'datang' => 'required',
            'pulang' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->route('jadwal.create')->withErrors($validate)->withInput();
        }

        //melihat apakah ada jadwal dari instansi yang sama di hari tersebut
        $adaJadwal = Jadwal::where('user_id', $request->user_id)->where('instansi_id', $request->instansi_id)->where('hari', $request->hari)->first();
        $terdaftar = User::find($request->user_id)->instansi()->where('instansi_id', $request->instansi_id)->first(); //melihat apakah user terdaftar pada instansi

        if ($terdaftar) {
            if (!$adaJadwal) {
                Jadwal::create([
                    'tapel_id' => $request->tapel_id,
                    'instansi_id' => $request->instansi_id,
                    'user_id' => $request->user_id,
                    'hari' => $request->hari,
                    'datang' => $request->datang,
                    'pulang' => $request->pulang
                ]);

                return redirect()->route('jadwal.index')->with('success', 'Berhasil Menginputkan Jadwal');
            } else {
                return redirect()->back()->with('error', 'User ini telah terjadwal di instansi ini pada hari ini');
            }
        } else {
            return redirect()->back()->with('error', 'User ini tidak terdaftar pada instansi ini');
        }



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
        $jadwal = Jadwal::find($id);
        return view('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all, [
            'tapel_id' => 'required|exists:tapels,id',
            'instansi_id' => 'required|exists:instansis,id',
            'user_id' => 'required|exists:users,id',
            'hari' => 'required',
            'datang' => 'required',
            'pulang' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->route('jadwal.create', $id)->withErrors($validate)->withInput();
        }

        $jadwal = Jadwal::findOrFail($id);
        $terdaftar = User::find($request->user_id)->instansi()->where('instansi_id', $request->instansi_id)->first(); //melihat apakah user terdaftar pada instansi


        if (!$terdaftar) {
            return redirect()->back()->with('error', 'User ini tidak terdaftar pada instansi ini');
        }

        //melihat apakah ada jadwal dari instansi yang sama di hari tersebut
        $adaJadwal = Jadwal::where('user_id', $request->user_id)->where('instansi_id', $request->instansi_id)
            ->where('hari', 'senin')
            ->where('id', '!=', $id)
            ->first();

        if ($adaJadwal) {
            return redirect()->back()->with('error', 'User ini sudah punya jadwal di instansi ini pada hari yang sama');
        }

        Jadwal::create([
            'tapel_id' => $request->tapel_id,
            'instansi_id' => $request->instansi_id,
            'user_id' => $request->user_id,
            'hari' => $request->hari,
            'datang' => $request->datang,
            'pulang' => $request->pulang
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Berhasil mengedit Jadwal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $target = Jadwal::find($id);
        $target->delete();
        return redirect()->route('jadwal.index');
    }
}
