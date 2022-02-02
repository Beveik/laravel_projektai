<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\Weather;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class ProcessStore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $city;

    public function __construct($city)
    {
        // Log::info('Entered Job ProcessStore __constructor method');
        $this->city = $city->withoutRelations();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Log::info('Entered Job ProcessStore handle method');

        // $city = 'Vilnius';

        $response = Http::get('api.openweathermap.org/data/2.5/weather?q=' .$this->city. '&units=metric&appid=d3e07c050f1965ecadfacc40181285e0');

        $getTemperature = json_decode($response, true);

        $temperature = $getTemperature["main"]["temp"];
        $name = $getTemperature["name"];

        Weather::create([
            'city' => $name,
            'temperature' => $temperature,
        ]);

        // Log::info('Exited from Job ProcessStore handle method');
    }
}
