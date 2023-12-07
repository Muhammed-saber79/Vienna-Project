<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index ()
    {
        return view('user.index');
    }

    public function register (Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:clients,email'],
        ]);

        try {
            $client = new Client();
            $client->name = $request->name;
            $client->email = $request->email;
            $client->ip_address = $request->ip();
            $client->save();

            return redirect()->route('home')->with('success', 'Your registeration request has been sent successfully.');
        } catch (Exception $e) {
            return redirect()->route('home')->with('error', 'Error, While trying to send register request...!');
        }   
    }
}
