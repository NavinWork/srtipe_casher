<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Product 1', 'price' => 10.99, 'description' => 'Description for product 1'],
            ['name' => 'Product 2', 'price' => 20.99, 'description' => 'Description for product 2'],
            ['name' => 'Product 3', 'price' => 30.99, 'description' => 'Description for product 3'],
        ]);
    }
}
