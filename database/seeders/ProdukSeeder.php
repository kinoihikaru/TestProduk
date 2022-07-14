<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'nama' => 'Odol',
            'harga' => 10000,
            'user_id' => 1,
        ]);

        Produk::create([
            'nama' => 'Gelas',
            'harga' => 5000,
            'user_id' => 1,
        ]);

        Produk::create([
            'nama' => 'Parfum',
            'harga' => 100000,
            'user_id' => 1,
        ]);

        Produk::create([
            'nama' => 'Portabel',
            'harga' => 75000,
            'user_id' => 1,
        ]);

        Produk::create([
            'nama' => 'Charger',
            'harga' => 45000,
            'user_id' => 1,
        ]);

        Produk::create([
            'nama' => 'Sd Card',
            'harga' => 80000,
            'user_id' => 1,
        ]);
    }
}
