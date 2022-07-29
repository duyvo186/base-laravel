<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use  Notifiable;
    use  HasFactory;
    protected $table = "customers";
    protected $guard = 'customer';

    protected $fillable = [
        'name',
        'phone',
        'username',
        'address',
        'email',
        'password',
        'content'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'customer_id', 'id');
    }
}
