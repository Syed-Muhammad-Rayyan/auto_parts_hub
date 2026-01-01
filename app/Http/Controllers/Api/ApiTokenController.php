<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiToken;

class ApiTokenController extends Controller
{
    public function generateToken(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abilities' => 'array',
            'abilities.*' => 'string'
        ]);

        $abilities = $request->abilities ?? ['*'];

        $token = ApiToken::generateToken($request->name, $abilities);

        return response()->json([
            'success' => true,
            'token' => $token->token,
            'name' => $token->name,
            'abilities' => $token->abilities,
            'created_at' => $token->created_at,
            'message' => 'API token generated successfully. Use this token in Authorization header: Bearer ' . $token->token
        ]);
    }
}
