<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Makanan Berat',
            'slug' => 'Makanan-Berat',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit, commodi aut! Repellendus iusto dolore eum?'
        ]);
        Category::create([
            'title' => 'Makanan Ringan',
            'slug' => 'Makanan-Ringan',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit, commodi aut! Repellendus iusto dolore eum?'
        ]);
        Category::create([
            'title' => 'Minuman',
            'slug' => 'Minuman',
            'deskripsi' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit, commodi aut! Repellendus iusto dolore eum?'
        ]);
    }
}
