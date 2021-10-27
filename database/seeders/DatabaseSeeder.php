<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Storage;

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
        // Storage::cleanDirectory('cursos');
        Storage::deleteDirectory('cursos');
        Storage::makeDirectory('cursos');


        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);      
        $this->call(CategorySeeder::class); 
        $this->call(PriceSeeder::class);  
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);   
    }
}
