<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//         DB::table('authors')->insert([
// 'name'=> Str::random(10),
// 'surname'=> Str::random(15),
// 'username'=> Str::random(10)
//         ]);

        DB::table('authors')->insert([
            'name'=> "Edvinas",
            'surname'=> "Valikonis",
            'username'=> "Wusheng"
                    ]);
    }
}
