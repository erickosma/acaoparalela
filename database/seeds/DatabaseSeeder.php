<?php

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
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeed::class);
        $this->call(City2TableSeeder::class);
        $this->call(City3TableSeeder::class);
        $this->call(City4TableSeeder::class);
    }
}
