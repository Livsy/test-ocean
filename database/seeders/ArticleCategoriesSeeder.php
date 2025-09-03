<?php

namespace Database\Seeders;

use App\Models\ArticlesCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ArticlesCategories::query()->insert([
            [
                'id' => 1,
                'name' => 'Новини',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Статті',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
