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
        $this->call(UserSeeder::class);
        $this->call(SectorsSeeder::class);
        $this->call(StoSeeder::class);
        $this->call(CrewSeeder::class);
        $this->call(TypeSeeder::class);
    }
}
