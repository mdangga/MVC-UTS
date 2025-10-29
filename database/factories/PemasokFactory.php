<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PemasokFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_pemasok' => fake()->company(),
            'kontak' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
        ];
    }
}
