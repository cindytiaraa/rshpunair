<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|unique:role,nama_role',
        ]);

        Role::create([
            'nama_role' => $request->nama_role,
        ]);

        return redirect()->route('admin.role.index')
            ->with('success', 'Role berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        return view('admin.role.edit', compact('roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_role' => "required|unique:role,nama_role,$id,idrole",
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'nama_role' => $request->nama_role,
        ]);

        return redirect()->route('admin.role.index')
            ->with('success', 'Role berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->deleted_by = auth()->user()->iduser;
        $role->save();
        $role->delete(); 

        return redirect()->route('admin.role.index')
            ->with('success', 'Role berhasil dihapus!');
    }
}