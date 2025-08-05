<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Validator;



class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::all();
        return view('', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = Permission::all();
        return view('', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "name" => "required|uniqe:role, name|string",
            "permissions" => "required|array",
            "permissions.*" => "exists:permissions,id"
        ]);

        if ($validate->fails()) {
            return redirect()->route('users.create')->withErrors($validate)->withInput();
        }

        $role = Role::create([
            "name" => $request->name
        ]);

        $role->syncPermissions($request->permissions);
        return redirect()->route('role.index');

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
        $role = Role::find('id');
        $permission = Permission::all();
        return view('', compact('role', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $target = Role::find($id);
        $validate = Validator::make($request->all(), [
            "name" => "required|uniqe:role, name|string",
            "permissions" => "required|array",
            "permissions.*" => "exists:permissions,id"
        ]);

        if ($validate->fails()) {
            return redirect()->route('users.create')->withErrors($validate)->withInput();
        }

        $target->update([
            "name" => $request->name
        ]);

        $target->syncPermissions($request->permission);
        return redirect()->route('role.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $target = Role::find($id);
        $target->delete();
        return redirect()->route('role.index');
    }
}
