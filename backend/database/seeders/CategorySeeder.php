<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Салаты',
            'Первые блюда',
            'Вторые блюда',
            'Напитки',
            'Десерты',
            'Фрукты и овощи',
        ];

        $categoriesData = [];

        foreach ($categories as $category) {
            $categoriesData[] = [
                'name' => $category,
                'code' => Str::kebab(Str::transliterate($category)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('categories')->insert($categoriesData);
    }
}
