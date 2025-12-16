<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roleUser.role')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password, 
        ]);

        // simpan role user
        $user->roleUser()->create([
            'idrole' => $request->role,
            'status' => 1
        ]);

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data  = User::with('roleUser')->where('iduser', $id)->firstOrFail();
        $roles = Role::all();

        return view('admin.user.edit', compact('data', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => "required|email|unique:user,email,$id,iduser",
            'password' => 'nullable',
            'role' => 'required'
        ]);

        $user = User::where('iduser', $id)->firstOrFail();

        $user->nama  = $request->nama;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = $request->password;
        }

        $user->save();

        // update role
        $user->roleUser()->update([
            'idrole' => $request->role
        ]);

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::where('iduser', $id)->firstOrFail();
        $user->deleted_by = auth()->user()->iduser;
        $user->save();
        $user->delete(); 

        return redirect()->route('admin.user.index')
            ->with('success', 'User berhasil dihapus!');
    }
}