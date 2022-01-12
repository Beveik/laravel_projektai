<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewScore;

class NewScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NewScore::create([
            'score' => '1',
            'description' => 'really shitty',
            'color_code' => '#ff0000',

        ]);
        NewScore::create([
            'score' => '2',
            'description' => 'super shitty',
            'color_code' => '#ff5500',

        ]);
        NewScore::create([
            'score' => '3',
            'description' => 'just shitty',
            'color_code' => '#ff8000',

        ]);
        NewScore::create([
            'score' => '4',
            'description' => 'bad',
            'color_code' => '#ffaa00',

        ]);
        NewScore::create([
            'score' => '5',
            'description' => 'not bad',
            'color_code' => '#ffd500',

        ]);
        NewScore::create([
            'score' => '6',
            'description' => 'rnormal',
            'color_code' => '#ffff00',

        ]);
        NewScore::create([
            'score' => '7',
            'description' => 'better than usual',
            'color_code' => '#d5ff00',

        ]);
        NewScore::create([
            'score' => '8',
            'description' => 'good',
            'color_code' => '#aaff00',

        ]);
        NewScore::create([
            'score' => '9',
            'description' => 'super',
            'color_code' => '#55ff00',

        ]);
        NewScore::create([
            'score' => '10',
            'description' => 'super amazing',
            'color_code' => '#00ff00',

        ]);
    }
}
