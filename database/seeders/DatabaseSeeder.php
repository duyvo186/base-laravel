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
        InvoiceProduct::factory(1)->create();;
//        Customer::factory(1)->create();;
//        Invoice::factory(1)->create();;
//        Product::factory(1)->create();
    }
}
