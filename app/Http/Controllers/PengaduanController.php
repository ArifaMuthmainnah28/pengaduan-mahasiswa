<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::all();
        return view('pengaduans.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('pengaduans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        // Simpan pengaduan ke database
        $pengaduan = new Pengaduan();
        $pengaduan->judul = $request->judul;
        $pengaduan->isi = $request->isi;
        $pengaduan->user_id = Auth::id(); // Penting: simpan ID user yang sedang login
        $pengaduan->save();

        return redirect()->route('user.dashboard')
                        ->with('success', 'Pengaduan berhasil dikirim.');
    }

    public function edit(Pengaduan $pengaduan)
    {
        return view('pengaduans.edit', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        $pengaduan->update($request->all());

        return redirect()->route('pengaduans.index')
                         ->with('success', 'Pengaduan berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('pengaduans.index')
                         ->with('success', 'Pengaduan berhasil dihapus.');
    }
}
