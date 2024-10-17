<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kategori_id', 'harga'];

    public function transaksiItems()
    {
        return $this->morphMany(TransaksiItem::class, 'item');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
