<?php

namespace Database\Factories;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    protected $model = Produk::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kategori_produk_id' => fake()->numberBetween(1, 9),
            'kode' => fake()->text(10),
            'nama' => $this->faker->text(50),
            'stok' => fake()->numberBetween(0, 240),
            'harga_jual' => fake()->numberBetween(200000, 200000),
            'is_active' => 1
        ];
    }
}
