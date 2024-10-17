<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::all();
        return view('makanan.index', compact('makanans'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('makanan.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric',
        ]);

        Makanan::create($request->all());

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan.');
    }

    public function edit(Makanan $makanan)
    {
        $kategoris = Kategori::all();
        return view('makanan.edit', compact('makanan', 'kategoris'));
    }

    public function update(Request $request, Makanan $makanan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga' => 'required|numeric',
        ]);

        $makanan->update($request->all());

        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui.');
    }

    public function destroy(Makanan $makanan)
    {
        $makanan->delete();
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil dihapus.');
    }
}
