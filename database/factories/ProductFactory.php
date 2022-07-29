<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $numberactive = 1;
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->randomAscii(),
            'content' => $this->faker->randomAscii(),
            'price' => $this->faker->buildingNumber(),
            'price_sale' => $this->faker->buildingNumber(),
            'active' => $numberactive,
        ];
    }
}
