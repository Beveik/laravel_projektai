<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaginationSetting;

class PaginationSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaginationSetting::create([
                'title' => '30',
                'value' => '30',
                'visible' => '1'
            ]);

            PaginationSetting::create([
                'title' => '15',
                'value' => '15',
                'visible' => '1'
            ]);
            PaginationSetting::create([
                'title' => '5',
                'value' => '5',
                'visible' => '1'
            ]);
            PaginationSetting::create([
                'title' => 'All',
                'value' => '1',
                'visible' => '1'
            ]);
    }
}
