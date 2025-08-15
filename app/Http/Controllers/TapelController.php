<?php

namespace App\Http\Controllers;

use App\Models\Tapel;
use Illuminate\Http\Request;
use Livewire\Features\SupportConsoleCommands\Commands\MakeCommand;
use Validator;

class TapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tapel = Tapel::all();
        return view('', compact('tapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "kode" => "required"
        ]);

        if($validate->fails()){
            return redirect()->route('instansi.create')->withErrors($validate)->withInput();
        }

        Tapel::create([$validate]);

        return redirect()->route('tapel.index');
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
        $tapel = Tapel::find($id);
        return view('', compact('tapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Tapel::find($id);

        $validate = Validator::make($request->all(), [
            "kode" => 'required'
        ]);

        if($validate->fails()){
            return redirect()->route('instansi.create', $id)->withErrors($validate)->withInput();
        }

        $target->update([
            $validate
        ]);

        return redirect()->route('tapel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $target = Tapel::find($id);
        $target->delete();
        return redirect()->route('tapel.index');
    }
}
