<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $contactsData = [
            [
                'type' => 'contact',
                'code' => 'phone',
                'value' => '+7 777 000 0000',
                'name' => 'номер телефона',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type' => 'contact',
                'code' => 'address',
                'value' => 'г. Усть-каменогорск, ул. Мызы, 51.',
                'name' => 'адрес',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type' => 'contact',
                'code' => 'email',
                'value' => 'help@easyfood.kz',
                'name' => 'почта',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type' => 'system',
                'code' => 'workday_start',
                'value' => '9:00',
                'name' => 'время открытия',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'type' => 'system',
                'code' => 'workday_end',
                'value' => '18:00',
                'name' => 'время закрытия',
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ];

        DB::table('settings')->insert($contactsData);
    }
}
