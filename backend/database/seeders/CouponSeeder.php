<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $createTime = Carbon::now();
        $couponsData = [
            [
                'type' => 'Скидка',
                'value' => '10',
                'promo_code' => '10',
                'name' => 'Скидка 10%',
                'created_at' => $createTime,
                'updated_at' => $createTime,
            ],
            [
                'type' => 'Скидка',
                'value' => '25',
                'promo_code' => '25',
                'name' => 'Скидка 25%',
                'created_at' => $createTime,
                'updated_at' => $createTime,
            ],
        ];

        DB::table('coupons')->insert($couponsData);
    }
}
