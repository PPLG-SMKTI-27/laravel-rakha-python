<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // Menampilkan halaman dashboard
    public function index()
    {
        $user = auth()->user();

        // Data portofolio dari session atau database
        $portfolio = session('portfolio', [
            'nama' => 'Rakha Wardhana',
            'email' => $user?->email,
            'profesi' => 'Web Developer',
            'tentang' => 'Saya adalah seorang developer berpengalaman',
            'telepon' => '082321112030',
            'lokasi' => 'Samarinda, Indonesia',
        ]);

        return view('dashboard.index', compact('portfolio'));
    }

    // Memproses update data diri
    public function update(Request $request)
    {
        $user = auth()->user();

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'profesi' => 'required|string|max:100',
            'tentang' => 'required|string',
            'telepon' => 'required|string|max:20',
            'lokasi' => 'required|string|max:100',
        ]);

        // Simpan ke session (untuk demo)
        $portfolio = [
            'nama' => $request->input('nama'),
            'email' => $user?->email,
            'profesi' => $request->input('profesi'),
            'tentang' => $request->input('tentang'),
            'telepon' => $request->input('telepon'),
            'lokasi' => $request->input('lokasi'),
        ];

        session(['portfolio' => $portfolio]);

        return redirect()->route('dashboard')
            ->with('success', 'Data diri berhasil diperbarui');
    }
}
