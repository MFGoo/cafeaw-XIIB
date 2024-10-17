<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    /**
     * Atribut yang diizinkan untuk mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 
        'kategori_id', 
        'harga', 
        'stok'
    ];

    /**
     * Relasi ke model Kategori.
     * Barang belongs to Kategori.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    /**
     * Relasi morphMany dengan TransaksiItem.
     * Barang dapat menjadi item dalam transaksi.
     */
    public function transaksiItems()
    {
        return $this->morphMany(TransaksiItem::class, 'item');
    }
}
