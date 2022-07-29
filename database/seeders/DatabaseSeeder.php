<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        InvoiceProduct::factory(10)->create();;
//        Customer::factory(10)->create();;
//        Invoice::factory(10)->create();;
//        Product::factory(10)->create();
    }
}
