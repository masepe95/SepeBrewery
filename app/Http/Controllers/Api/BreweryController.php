<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BreweryController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('https://api.openbrewerydb.org/v1/breweries', [
            'page' => $request->query('page', 1),
            'per_page' => $request->query('per_page', 10),
        ]);

        return response()->json($response->json());
    }
}
