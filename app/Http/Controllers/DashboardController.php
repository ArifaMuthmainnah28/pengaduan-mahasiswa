<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function user()
    {
        $pengaduanSaya = Pengaduan::where('user_id', Auth::id())->latest()->get();
        $semuaPengaduan = Pengaduan::with('user')->latest()->get();

        return view('dashboard-user', compact('pengaduanSaya', 'semuaPengaduan'));
    }

    public function admin()
    {
        $pengaduan = Pengaduan::latest()->get();
        $users = User::all();

        // Statistik
        $totalPengguna = $users->where('role', 'user')->count();
        $totalAdmin = $users->where('role', 'admin')->count();
        $totalPengaduan = $pengaduan->count();

        return view('dashboard-admin', compact('pengaduan', 'users', 'totalPengguna', 'totalAdmin', 'totalPengaduan'));
    }

}

