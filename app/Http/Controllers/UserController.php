<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Tampilkan semua user dan admin terpisah
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        $users = User::where('role', 'user')->get();

        return view('users.index', compact('admins', 'users'));
    }

    // Hapus hanya jika bukan admin
    public function destroy(User $user)
    {
        if ($user->role === 'admin') {
            return back()->with('error', 'Admin tidak boleh menghapus admin lain.');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}
