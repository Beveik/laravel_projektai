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
        $this->call(class: TypeSeeder::class);
        $this->call(class: OwnerSeeder::class);
        $this->call(class: TaskSeeder::class);

    }
}
