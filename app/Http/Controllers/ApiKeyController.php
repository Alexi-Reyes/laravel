<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApiKey;
use Inertia\Inertia;

class ApiKeyController extends Controller
{
    public function index()
    {
        $apiKeys = Auth::user()->apiKeys;

        return Inertia::render('ApiKey/Index', [
            'apiKeys' => $apiKeys
        ]);
    }

    public function create()
    {
        $apiKeys = Auth::user()->apiKeys;
        
        return Inertia::render('ApiKey/Create', [
            'apiKeys' => $apiKeys
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $apiKey = Auth::user()->apiKeys()->create([
            'uuid' => \Illuminate\Support\Str::uuid(),
            'name' => $request->name,
            'key' => \Illuminate\Support\Str::random(32),
        ]);

        return Inertia::location(route('apiKeys.index'));
    }

    public function destroy(ApiKey $apiKey)
    {
        $apiKey->delete();

        return Inertia::location(route('apiKeys.index'));
    }
}
