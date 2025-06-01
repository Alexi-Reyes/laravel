<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\ApiKey;

class ApiKeyMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('x-api-key');
        // $apiKey = "UNczG3fXti0IOh94KtR3YTXTQ2xlxZh9TwukCu4U";

        if (!$apiKey) {
            return response()->json(['message' => 'API key is missing'], 400);
        }

        $apiKeyModel = ApiKey::where('key', $apiKey)->first();

        if (!$apiKeyModel) {
            return response()->json(['message' => 'Invalid API key'], 400);
        }

        $user = $apiKeyModel->user;

        if (!$user) {
            return response()->json(['message' => 'Invalid API key'], 400);
        }

        \Illuminate\Support\Facades\Auth::login($user);

        return $next($request);
    }
}
