<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => "product 1",
                'value' => "#838F8C",
                "description" => "",
                "price" => 7.0,
            ],
            [
                'name' => "Product 2",
                'value' => "#665b07",
                "description" => "",
                "price" => 7.0,
            ], [
                'name' => "Product 3",
                'value' => "#560006",
                "description" => "",
                "price" => 7.0,
            ], [
                'name' => "Product 4",
                'value' => "#fd978a",
                "description" => "",
                "price" => 7.0,
            ], [
                'name' => "Product 5",
                'value' => "#121619",
                "description" => "",
                "price" => 7.0,
            ], [
                'name' => "Product 6",
                'value' => "#c46835",
                "description" => "",
                "price" => 7.0,
            ], [
                'name' => "Product 7",
                'value' => "#d66148",
                "description" => "",
                "price" => 7.0,
            ],

        ]);
        DB::table('images')->insert([
            [
                'product_id' => "1",
                'type' => "top_view",
                "file_name" => "Product_1_tv.jpg",
            ],
            [
                'product_id' => "2",
                'type' => "top_view",
                "file_name" => "Product_2_tv.jpg",
            ],
            [
                'product_id' => "3",
                'type' => "top_view",
                "file_name" => "Product_3_tv.jpg",
            ],
            [
                'product_id' => "4",
                'type' => "top_view",
                "file_name" => "Product_4_tv.jpg",
            ],
            [
                'product_id' => "5",
                'type' => "top_view",
                "file_name" => "Product_5_tv.jpg",
            ],  [
                'product_id' => "6",
                'type' => "top_view",
                "file_name" => "Product_6_tv.jpg",
            ],
            [
                'product_id' => "7",
                'type' => "top_view",
                "file_name" => "Product_7_tv.jpg",
            ],
        ]);
    }
}
