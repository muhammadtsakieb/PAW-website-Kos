<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index()   // Latihan.php
    {
        $kamar = Kamar::orderBy('id')->get();
        return view('kamar.index', compact('kamar'));
    }

    public function detail()  // Latihan2.php
    {
        $kamar = Kamar::orderBy('id')->get();
        return view('kamar.detail', compact('kamar'));
    }

    public function admin()   // Admin.php
    {
        $kamar = Kamar::orderBy('id')->get();
        return view('kamar.admin', compact('kamar'));
    }

    public function edit(Kamar $kamar)   // edit.php (GET)
    {
        return view('kamar.edit', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)   // edit.php (POST)
    {
        $data = $request->validate([
            'nama_kamar' => 'required',
            'tipe'       => 'required',
            'ukuran'     => 'required',
            'harga'      => 'required|integer|min:0',
            'fasilitas'  => 'nullable',
            'gambar'     => 'nullable',
        ]);

        $kamar->update($data);

        return redirect()->route('kamar.admin');
    }
        public function create()   // Tambah.php (GET)
    {
        return view('kamar.create');
    }

    public function store(Request $request)   // Tambah.php (POST)
    {
        $data = $request->validate([
            'nama_kamar' => 'required',
            'tipe'       => 'required',
            'ukuran'     => 'required',
            'harga'      => 'required|integer|min:0',
            'fasilitas'  => 'nullable',
            'gambar'     => 'nullable',
        ]);

        Kamar::create($data);

        return redirect()->route('kamar.admin');
    }

    public function destroy(Kamar $kamar)   // hapus.php
    {
        $kamar->delete();

        return redirect()->route('kamar.admin');
    }
}