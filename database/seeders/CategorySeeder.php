<?php

namespace Database\Seeders;

//Models    
use App\Models\Category;

//Helpers
use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            "PHP",
            "JavaScript",
            "CSS",
            "HTML",
            "Laravel",
            "Vue"
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create([
                "name" => $category,
                "slug" => Str::slug($category),
            ]);
        }
    }
}
