<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest();
        if (request('cari')) {
            $users = $users->where('name', 'like', '%' . request('cari') . '%');
        } else {
            $users = $users->paginate(5);
        }
        return view('admin.menuUtama.pengguna.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menuUtama.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'nip' => 'required|numeric|unique:users,nip|digits:13',
            'role' => 'required|in:admin,operator',
            'password' => 'required|min:8',
        ], $this->feedback_validate);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'role' => $request->role,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/pengguna')->with('success', 'Pengguna baru berhasil ditambahkan');
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
    public function edit(user $user)
    {
        return view('admin.menuUtama.pengguna.edit', [
            'item' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nip' => 'required|numeric|digits:13|unique:users,nip,' . $user->id,
            'role' => 'required|in:admin,operator'
        ], $this->feedback_validate);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'role' => $request->role,
            'password' => $user->password
        ]);

        return redirect('/pengguna')->with('success', 'Pengguna baru berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/pengguna')->with('success', 'Pengguna berhasil dihapus');
    }

    public function password(User $user)
    {
        return view('admin.menuUtama.pengguna.password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:8'
        ]);

        $user->update([
            'name' => $user->name,
            'email' => $user->email,
            'nip' => $user->nip,
            'role' => $user->role,
            'password' => Hash::make($request->password)
        ], $this->feedback_validate);

        return redirect('/pengguna')->with('success', 'Pengguna berhasil mengubah password');
    }
}
