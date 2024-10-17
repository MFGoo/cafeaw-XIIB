<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategori')->insert([
            ['nama' => 'Makanan Berat'],
            ['nama' => 'Makanan Ringan'],
            ['nama' => 'Minuman'],
            ['nama' => 'Kue'],
            ['nama' => 'Dessert']
        ]);
    }
}
