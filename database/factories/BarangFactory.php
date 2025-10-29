<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Pemasok;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->words(2, true),
            'stok' => fake()->numberBetween(10, 100),
            'harga' => fake()->numberBetween(5000, 100000),
            'id_kategori' => Kategori::factory(),
            'id_pemasok' => Pemasok::factory(),
        ];
    }
}
