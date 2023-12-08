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

    public function updateUser(Request $request, Client $client)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:clients,email,' . $client->id],
        ]);

        try {
            $client->update( $request->only('name', 'email') );

            return redirect()->route('dashboard.index')->with('success', 'User\'s data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.index')->with('error', 'Error, While trying to update user\'s data...!');
        }  
    }

    public function destroyUser(Client $client)
    {
        try {
            $client->delete();

            return redirect()->route('dashboard.index')->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.index')->with('error', 'Error, While trying to delete this user...!');
        } 
    }
}
