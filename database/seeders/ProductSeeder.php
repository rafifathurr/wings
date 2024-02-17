<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_code' => 'SKUSKILNP',
            'product_name' => 'So Klin Pewangi',
            'price' => 15000,
            'currency' => 'IDR',
            'discount' => 0.1,
            'dimension' => '13 cm x 10 cm',
            'unit' => 'PCS',
        ]);

        Product::create([
            'product_code' => 'BLGIVSP',
            'product_name' => 'Giv Biru',
            'price' => 11000,
            'currency' => 'IDR',
            'dimension' => '7 cm x 5 cm',
            'unit' => 'PCS',
        ]);

        Product::create([
            'product_code' => 'SKUSKILNL',
            'product_name' => 'So Klin Liquid',
            'price' => 18000,
            'currency' => 'IDR',
            'dimension' => '10 cm x 5 cm',
            'unit' => 'PCS',
        ]);

        Product::create([
            'product_code' => 'SSFTLDTB',
            'product_name' => 'So Soft Detergent B',
            'price' => 55000,
            'currency' => 'IDR',
            'discount' => 0.20,
            'dimension' => '20 cm x 15 cm',
            'unit' => 'PCS',
        ]);

        Product::create([
            'product_code' => 'SSFTLDTP',
            'product_name' => 'So Soft Detergent P',
            'price' => 55000,
            'currency' => 'IDR',
            'discount' => 0.25,
            'dimension' => '20 cm x 15 cm',
            'unit' => 'PCS',
        ]);
    }
}
