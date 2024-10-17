<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
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
        'deskripsi'
    ];

    /**
     * Relasi ke model Kategori.
     * Item belongs to Kategori.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
