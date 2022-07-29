<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'total' => $this->faker->buildingNumber(),
            'customer_id'=>$this->faker->randomElement(Customer::pluck('id')),
            'created_at' => $this->faker->date(),
        ];
    }
}
