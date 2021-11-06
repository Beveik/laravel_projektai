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
        $this->call(class: ShopSeeder::class);
        $this->call(class: CategorySeeder::class);
        $this->call(class: ProductSeeder::class);
    }
}
