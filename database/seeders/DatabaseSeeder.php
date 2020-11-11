<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\SchoolSeeder;
use Database\Seeders\StudentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	UserSeeder::class,
            CitySeeder::class,
            SchoolSeeder::class,
            StudentSeeder::class,
        ]);
    }
}
