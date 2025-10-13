<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->word(),
            'stok' => fake()->numberBetween(10, 100),
            'harga' => fake()->numberBetween(5000, 100000),
        ];
    }
}
