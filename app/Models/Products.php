<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    public $timestamps = true;

    public static function findOneWithTopView($product_id)
    {
        return DB::table('products')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'images.file_name')
            ->where("images.type", "=", 'top_view')
            ->where('products.id', '=', $product_id)
            ->first();
    }
    public static function findAllWithTopView()
    {
        return DB::table('products')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'images.file_name')
            ->where("images.type", "=", 'top_view')
            ->get();
    }

    public static function findOneWithCroppedPic($product_id)
    {
        return DB::table('products')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'images.file_name')
            ->where("images.type", "=", 'cropped_view')
            ->where('products.id', '=', $product_id)
            ->first();
    }
    public static function findAllWithCroppedImage()
    {
        return DB::table('products')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->select('products.*', 'images.file_name')
            ->where("images.type", "=", 'cropped_view')
            ->get();
    }
}
