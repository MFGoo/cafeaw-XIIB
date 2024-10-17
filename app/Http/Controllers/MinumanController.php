<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MinumanController extends Controller
{
    // Menampilkan daftar minuman
    public function index()
    {
        $minumans = Minuman::with('kategori')->get();
        return view('minuman.index', compact('minumans'));
    }

    // Menampilkan form untuk menambahkan minuman baru
    public function create()
    {
        $kategoris = Kategori::all();
        return view('minuman.create', compact('kategoris'));
    }

    // Menyimpan minuman baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric',
        ]);

        Minuman::create($request->all());

        return redirect()->route('minuman.index')->with('success', 'Minuman berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit minuman
    public function edit(Minuman $minuman)
    {
        $kategoris = Kategori::all();
        return view('minuman.edit', compact('minuman', 'kategoris'));
    }

    // Memperbarui minuman di database
    public function update(Request $request, Minuman $minuman)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric',
        ]);

        $minuman->update($request->all());

        return redirect()->route('minuman.index')->with('success', 'Minuman berhasil diperbarui.');
    }

    // Menghapus minuman dari database
    public function destroy(Minuman $minuman)
    {
        $minuman->delete();
        return redirect()->route('minuman.index')->with('success', 'Minuman berhasil dihapus.');
    }
}
