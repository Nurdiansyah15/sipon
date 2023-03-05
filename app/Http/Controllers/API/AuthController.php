<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nis' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('nis', $request->nis)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'nis' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('sipontoken')->plainTextToken;

        $response = [
            'nis' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $request->validate([
            'nis' => 'required|string',
        ]);

        $user = User::where('nis', $request->nis)->first();

        $user->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
