<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name'=>$this->faker->name(),
            'market'=>'DIRO',
            'price'=>$this->faker->numberBetween(1000,10000),
            'pic'=>'images/pic.jpg',
            'description'=>$this->faker->paragraph(5)
        ];
    }
}
