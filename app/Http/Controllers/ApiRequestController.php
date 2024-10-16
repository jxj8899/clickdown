<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\History;

class ApiRequestController extends Controller
{
    public function showForm()
    {
        return view('api-form');
    }

    public function submitApi(Request $request)
    {
        // Validate the incoming form data
        $request->validate([
            'host' => 'required|url',
            'method' => 'required|string',
            'rmethod' => 'required|string',
            'header' => 'required|string',
            'request' => 'required|integer',
            'geo' => 'required|string',
        ]);

        // Prepare the API parameters (keeping 'time' and 'concurrents' constant)
        $params = [
            'api_key' => 'f716e197-43942b79-6b3bbb8a-9f56ad44',
            'host' => $request->input('host'),
            'time' => 300, // Fixed time parameter
            'method' => $request->input('method'),
            'rmethod' => $request->input('rmethod'),
            'data' => '',
            'header' => $request->input('header'),
            'request' => $request->input('request'),
            'geo' => 'WORLDWIDE',
            'concurrents' => 1, // Fixed concurrent parameter
        ];

        try {
            // Make the API request
            $response = Http::get('https://flooder.su/API/l7', $params);

            // Parse the JSON response
            $responseBody = $response->json();

            // Save the response to the history table
            History::create([
                'status' => isset($responseBody['status']) ? $responseBody['status'] : 'Unknown',
                'response' => $response->body(),
                'msg' => $responseBody['msg'] ?? null,
                'api_id' => $responseBody['id'] ?? null,
                'params' => json_encode($responseBody['params'] ?? []),
            ]);

            // Return the response back to the view
            return view('api-response', ['response' => $responseBody]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to make the API request. ' . $e->getMessage()]);
        }
    }
}
