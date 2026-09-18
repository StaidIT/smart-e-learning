<?php

namespace App\Http\Controllers\Supabase;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'apikey' => config('services.supabase.service_key'),
            'Authorization' => 'Bearer ' . config('services.supabase.service_key'),
        ])->get(
            config('services.supabase.url') . '/rest/v1/products'
        );

        return response()->json($response->json());
    }
}
