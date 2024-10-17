<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Kategori;

class ItemController extends Controller
{
    // Menampilkan form tambah item
    public function create()
    {
        $kategoris = Kategori::all(); // Ambil semua kategori untuk ditampilkan di dropdown
        return view('item.create', compact('kategoris'));
    }

    // Menyimpan item baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|integer|exists:kategoris,id',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        // Simpan item baru ke database
        Item::create($validatedData);

        return redirect()->route('item.index')->with('success', 'Item berhasil ditambahkan');
    }

    // Menampilkan daftar item
    public function index()
    {
        $items = Item::with('kategori')->get(); // Ambil semua item beserta relasinya
        return view('item.index', compact('items'));
    }

    // Menampilkan form edit item
    public function edit(Item $item)
    {
       
        $kategoris = Kategori::all(); // Ambil kategori untuk dropdown saat mengedit item
        return view('item.edit', compact('item', 'kategoris'));
    }

    // Memperbarui item yang sudah ada
    public function update(Request $request, Item $item)
    {
        // Validasi input dari form edit
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|integer|exists:kategoris,id',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        // Update data item
        $item->update($validatedData);

        return redirect()->route('item.index')->with('success', 'Item berhasil diperbarui');
    }

     // Menampilkan form konfirmasi hapus item
     public function destroy(Item $item)
     {
         return view('item.delete', compact('item'));
     }
 
     // Menghapus item
     public function destroyConfirmed(Item $item)
     {
         $item->delete();
 
         return redirect()->route('item.index')->with('success', 'Item berhasil dihapus');
     }

    
}
