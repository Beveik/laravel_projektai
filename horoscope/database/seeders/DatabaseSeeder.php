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
        // \App\Models\User::factory(10)->create();
        $this->call(class: NewScoreSeeder::class);
        $this->call(class: ZodiacSeeder::class);
        $this->call(class: ByDaySeeder::class);
        $this->call(class: AverageSeeder::class);

    }
}
