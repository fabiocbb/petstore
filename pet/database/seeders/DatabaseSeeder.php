<?php

namespace Database\Seeders;

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
        $this->call([TagTableSeeder::class,
                    CategoryTableSeeder::class,
                    PetTableSeeder::class]);

        $this->command->info('Tags, categories and pets tables seeded!');
    }

}
