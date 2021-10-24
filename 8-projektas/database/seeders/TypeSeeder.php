<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'title' => 'atlikta',
            'description' => 'užduotis pilnai atlikta.'
        ]);

        Type::create([
            'title' => 'neatlikta',
            'description' => 'užduotis dar neatlikta.'
        ]);
        Type::create([
            'title' => 'vykdoma',
            'description' => 'užduotis šiuo metu atliekama.'
        ]);
        Type::create([
            'title' => 'nebeaktuali',
            'description' => 'užduoties vykdymas neaktualus.'
        ]);
    }
}
