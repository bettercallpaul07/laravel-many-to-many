<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//helpers
use Faker\Generator as Faker;
use Illuminate\Support\Str;

//models
use App\Models\Project;
use App\Models\Category;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $categoryId = null;
            if (rand(0, 1) == 1) {
                $categoryId = Category::inRandomOrder()->first()->id;
            }

            $newProject = new Project();
            $newProject->title = $faker->sentence(3);
            $newProject->content = $faker->text(200);
            $newProject->slug = Str::slug($newProject->title);
            $newProject->category_id = $categoryId;
            $newProject->save();
        }
    }
}
