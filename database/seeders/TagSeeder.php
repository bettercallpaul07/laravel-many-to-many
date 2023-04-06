<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Tag;

//Helpers
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            $tags = [
                "Front-end",
                "Back-end",
                "Server",
                "Deep Learning",
                "Machine Learning",
                "Artificial Intelligence",
                "Data Science",
                "Data Analysis",
                "Data Visualization",
                "Data Mining",
                "Data Engineering",
                "Data Architecture",
                "Data Modeling",
                "Data Warehousing",
            ];

            foreach ($tags as $tag) {
                \App\Models\Tag::create([
                    "name" => $tag,
                    "slug" => Str::slug($tag),
                ]);
            }
        }
    }
}
