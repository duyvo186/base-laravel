<?php

namespace App\Providers;

use App\Http\Respositories\CustomerRepositoryInterface;
use App\Http\Respositories\Eloquent\CustomerRepository;
use App\Http\Respositories\Eloquent\CategoryRepository;
use App\Http\Respositories\Eloquent\InvoiceProductRepository;
use App\Http\Respositories\Eloquent\InvoiceRepository;
use App\Http\Respositories\Eloquent\NotificationRepository;
use App\Http\Respositories\Eloquent\ProductRepository;
use App\Http\Respositories\CategoryRepositoryInterface;
use App\Http\Respositories\InvoiceProductRepositoryInterface;
use App\Http\Respositories\InvoiceRepositoryInterface;
use App\Http\Respositories\NotificationRepositoryInterface;
use App\Http\Respositories\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
        $this->app->bind(InvoiceProductRepositoryInterface::class, InvoiceProductRepository::class);
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);
    }

}
