<?php

namespace Tests\Feature\Invoice;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Faker\Factory as Faker;

class GetListInvoiceTest extends TestCase
{
    public function test_add_invoice()
    {
        $customers = Customer::factory()->create();
        $products = Product::factory()->create();

        $response = $this->postJson(route('admin.invoice.store'), [
            'customer_id' => $customers->id,
            'total' => '100',
            'totalAll' => '1000',
            'product_id' => [
                '0' => $products->id,
            ],
            'quantity' => '10',
        ]);
        $response->assertStatus(302);

    }

    public function test_get_list_invoice()
    {
        $response = $this->getJson(route('admin.invoice.index'));
        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_show_invoice()
    {
        $response = $this->getJson(route('admin.invoiceProduct.show', 1));
        $response->assertStatus(200);
    }

    public function test_update_customer_invoice()
    {
        $customers = Customer::factory()->create();
        $response = $this->putJson(route('admin.invoice.update', $customers->id));
        $response->assertStatus(302);
    }

    public function test_destroy_invoice()
    {
        $invoice = Invoice::factory()->create();
        $response = $this->putJson(route('admin.invoice.destroy', $invoice->id));
        $response->assertStatus(302);
    }
}
