<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Laravel', 'description' => 'A PHP framework for web artisans.'],
            ['name' => 'PHP', 'description' => 'Server-side scripting language.'],
            ['name' => 'JavaScript', 'description' => 'Client-side scripting for web.'],
            ['name' => 'Vue.js', 'description' => 'Progressive JavaScript framework.'],
            ['name' => 'Bootstrap', 'description' => 'Front-end component library.'],
            ['name' => 'MySQL', 'description' => 'Relational database management system.'],
            ['name' => 'REST API', 'description' => 'Web service architecture style.'],
            ['name' => 'HTML', 'description' => 'Markup language for creating web pages.'],
            ['name' => 'CSS', 'description' => 'Style sheet language for web design.'],
            ['name' => 'Web Development', 'description' => 'The process of building websites.'],
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name'=> $tag['name'],
                'description'=> $tag['description'],
            ]);
        }
    }
}
