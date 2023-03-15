<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;
    // protected $dateFormat = 'U';
    protected $fillable = ['status', 'payment_intent_id', 'customer_first_name', "customer_last_name", "customer_emil", "shipping_address", "billing_address", "quantity", "amount", "created_at", "updated_at"];
}
