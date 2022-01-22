<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Metai;

class MetaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
for ($i=1990; $i<=2022; $i++){
        Metai::create([
            'metai' => $i,
        ]);
    }
    }
}
