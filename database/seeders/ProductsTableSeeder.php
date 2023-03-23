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
                'name' => "Givré",
                'value' => "#838F8C",
                "description" => "",
                "price" => 7.0,
            ],
            [
                'name' => "Vert kaki",
                'value' => "#665b07",
                "description" => "",
                "price" => 7.0,
            ], [
                'name' => "Bordeaux",
                'value' => "#560006",
                "description" => "",
                "price" => 7.0,
            ], [
                'name' => "Incarnation",
                'value' => "#fd978a",
                "description" => "",
                "price" => 7.0,
            ], [
                'name' => "Doriant",
                'value' => "#121619",
                "description" => "",
                "price" => 7.0,
            ], [
                'name' => "Saumon",
                'value' => "#c46835",
                "description" => "",
                "price" => 7.0,
            ], [
                'name' => "Terracotta",
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
                'product_id' => "1",
                'type' => "cropped_view",
                "file_name" => "HairClip PackS HD-19-min.webp",
            ],
            //
            [
                'product_id' => "2",
                'type' => "top_view",
                "file_name" => "Product_2_tv.jpg",
            ],
            [
                'product_id' => "2",
                'type' => "cropped_view",
                "file_name" => "HairClip PackS HD-20-min.webp",
            ],
            //
            [
                'product_id' => "3",
                'type' => "top_view",
                "file_name" => "Product_3_tv.jpg",
            ],
            [
                'product_id' => "3",
                'type' => "cropped_view",
                "file_name" => "HairClip PackS HD-21-min.webp",
            ],
            //
            [
                'product_id' => "4",
                'type' => "top_view",
                "file_name" => "Product_4_tv.jpg",
            ],
            [
                'product_id' => "4",
                'type' => "cropped_view",
                "file_name" => "HairClip PackS HD-22-min.webp",
            ],
            //
            [
                'product_id' => "5",
                'type' => "top_view",
                "file_name" => "Product_5_tv.jpg",
            ],
            [
                'product_id' => "5",
                'type' => "cropped_view",
                "file_name" => "HairClip PackS HD-23-min.webp",
            ],
            //
            [
                'product_id' => "6",
                'type' => "top_view",
                "file_name" => "Product_6_tv.jpg",
            ],
            [
                'product_id' => "6",
                'type' => "cropped_view",
                "file_name" => "HairClip PackS HD-24-min.webp",
            ],
            //
            [
                'product_id' => "7",
                'type' => "top_view",
                "file_name" => "Product_7_tv.jpg",
            ],
            [
                'product_id' => "7",
                'type' => "cropped_view",
                "file_name" => "HairClip PackS HD-25-min.webp",
            ],
        ]);
    }
}
