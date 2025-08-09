<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Spatie\Permission\Models\Role;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.main', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();
        $user = User::all();
        return view('user.tambah', compact('role','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //!jangan lupa tambahkan pengecekan apakah user punya role "admin_yayasan"
        //*sementara untuk keperluan testing

        // $validate = Validator::make($request->all(), [
        //     "name" => "required|min:5",
        //     "telp" => "required|numeric",
        //     "username" => "required",
        //     "password" => "required",
        //     "uid_rfid" => "required"
        // ]);

        // if ($validate->fails()) {
        //     return redirect()->route('users.create')->withErrors($validate)->withInput();
        // }

        $imageName = time() . '.' . $request->foto->extension();

        // $request->image->move(public_path('images'), $imageName);

        // //img intervention
        $manager = ImageManager::withDriver(new Driver());

        // //read image
        $image = $manager->read($request->file('foto'));
        $image->encode(new AutoEncoder(quality: 50))->save(public_path('foto/' . $imageName));

        $user = User::create([
            "name" => $request->name,
            "telp" => $request->telp,
            "username" => $request->username,
            "password" => $request->password,
            "uid_rfid" => $request->uid_rfid,
            "foto" => $imageName
        ]);

        $user->instansi()->attach($request->instansi_id);
        $user->roles()->attach($request->role_id);

        return redirect()->route('user.index');


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
        $user = User::find($id);
        // $instansi = User::all();
        return view('user.edit', compact('user','instansi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = User::find($id);
        $validate = Validator::make($request->all(), [
            "name" => "required|min:5",
            "telp" => "required|numeric",
            "username" => "required",
            "password" => "required",
            "uid_rfid" => "required"
        ]);

        if ($validate->fails()) {
            return redirect()->route('users.create')->withErrors($validate)->withInput();
        }

        $imageName = time() . '.' . $request->foto->extension();

        // $request->image->move(public_path('images'), $imageName);

        //img intervention
        $manager = ImageManager::withDriver(new Driver());

        //read image
        $image = $manager->read($request->file('foto'));
        $image->encode(new AutoEncoder(quality: 50))->save(public_path('foto/' . $imageName));

        $target->update([
            "name" => $request->name,
            "telp" => $request->telp,
            "username" => $request->username,
            "password" => $request->password,
            "uid_rfid" => $request->uid_rfid,
            "foto" => $imageName
        ]);

        $target->roles()->sync($request->role_id);
        $target->roles()->sync($request->instansi_id);

        return redirect()->route('user.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $target = User::find($id);
        $target->delete();
        return redirect()->route('user.index');
    }
}
