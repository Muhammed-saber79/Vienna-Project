<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;

class AdminController extends Controller
{
    public function index()
    {
        $clients = Client::paginate();

        return view('admin.index', compact('clients'));
    }

    public function getUserLocation (Request $request, Client $client)
    {
        $apiKey = config('services.ipstack.key');
        $ipAddress = $request->ip();
        $clientIp = new GuzzleHttpClient();
        $response = $clientIp->get("http://api.ipstack.com/$ipAddress?access_key=$apiKey");

        
        // Decode the JSON response
        $locationData = json_decode($response->getBody(), true);
        
        // Extract relevant information (latitude, longitude, city, country, etc.)
        $latitude = $locationData['latitude'] ?? null;
        $longitude = $locationData['longitude'] ?? null;
        $location = 'https://maps.google.com/?q=' . $latitude . ',' . $longitude;

        $client->location = $location;
        $client->save();

        return redirect()->route('dashboard.index')->with('success', 'Get user\'s location successfully.');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
