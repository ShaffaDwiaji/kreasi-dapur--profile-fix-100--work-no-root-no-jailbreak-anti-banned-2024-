<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul'=>$this->faker->sentence, 
            'deskripsi'=>$this->faker->paragraph, 
            'gambar' => 'images/' . $this->faker->unique()->word . '.jpg' . '.png',
            'bahan'=>$this->faker->sentence, 
            'langkah'=>$this->faker->paragraph
        ];
    }
}
