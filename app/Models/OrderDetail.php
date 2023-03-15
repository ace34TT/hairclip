<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = true;
    // protected $dateFormat = 'U';
    protected $fillable = ['order_id', 'product_id', 'quantity', "created_at", "updated_at"];
}
