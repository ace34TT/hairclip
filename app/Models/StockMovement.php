<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StockMovement extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', "type", 'quantity', "created_at", "updated_at"];

    public static function getStockMovements()
    {
        return  DB::table('stock_movements')
            ->join('products', 'products.id', '=', 'stock_movements.product_id')
            ->select('products.*', 'stock_movements.*')
            ->orderBy('stock_movements.id', 'desc')
            ->get();
    }
}
