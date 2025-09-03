<?php

namespace Database\Seeders;

use App\Models\Articles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Articles::query()->insert([
            [
                'id' => 1,
                'title' => 'Стаття 1',
                'content' => 'Текст до Статті 1',
                'category_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Стаття 2',
                'content' => 'Текст до Статті 2',
                'category_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
