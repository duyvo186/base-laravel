<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = "notifications";
    public $timestamps = true;

    protected $fillable = [
        'customer_id',
        'content',
        'status',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
