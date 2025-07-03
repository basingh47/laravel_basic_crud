<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $categories = [
            'Web Development',
            'Mobile Development',
            'Game Development',
            'Machine Learning',
            'Cloud Computing',
            'Cyber Security',
            'Data Science',
            'Artificial Intelligence',
            'DevOps',
            'UI/UX Design',
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name'=> $category,
            ]);
        }
    }
}
