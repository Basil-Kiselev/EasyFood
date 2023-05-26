<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $relatedProductsData = [
            [
                'product_id' => 1,
                'related_product_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 1,
                'related_product_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 2,
                'related_product_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 3,
                'related_product_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 4,
                'related_product_id' => 7,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 5,
                'related_product_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 6,
                'related_product_id' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 7,
                'related_product_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 8,
                'related_product_id' => 9,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 9,
                'related_product_id' => 8,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 10,
                'related_product_id' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 11,
                'related_product_id' => 12,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_id' => 12,
                'related_product_id' => 11,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('product_relations')->insert($relatedProductsData);
    }
}
