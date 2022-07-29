<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      static $number = 1;

        return [
            'invoice_id' => $this->faker->randomElement(Invoice::pluck('id')),
            'product_id'=> $this->faker->randomElement(Product::pluck('id')),
            'quantity' => $number ++,
            'total' => $this->faker->buildingNumber(),
        ];
    }



}
