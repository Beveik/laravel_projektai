<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marke;

class MarkeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marke::factory()->times(10)->create();
    }
}
