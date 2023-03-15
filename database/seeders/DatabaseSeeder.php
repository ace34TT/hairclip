<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // DB::table('images')->delete();
        // DB::statement('ALTER TABLE images AUTO_INCREMENT = 1');
        // DB::table('products')->delete();
        // DB::statement('ALTER TABLE products AUTO_INCREMENT = 1');
        // DB::table('products')->delete();

        // $this->call(ProductsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // 'password' => Hash::make('password'),
        // ]);
    }
}
