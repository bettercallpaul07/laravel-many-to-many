<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([
            CategorySeeder::class,
            ProjectSeeder::class,
            TagSeeder::class,

        //questa riga di codice chiama gli altri seeder
        //quindi prima di creare i progetti, creiamo le categorie, i tag e i progetti
        //in questo modo i progetti avranno le categorie e i tag
        //e le categorie e i tag avranno i progetti
        //in questo modo non avremo errori
        //inoltre, se cancelliamo una categoria, cancelliamo anche i progetti associati
        //se cancelliamo un tag, cancelliamo anche i progetti associati
        // se cancelliamo un progetto, cancelliamo anche le categorie e i tag associati
        ]);


    }
}
