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
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'username' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('sipontoken')->plainTextToken;

        $response = [
            'user_id' => $user->id,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
        ]);

        $user = User::where('id', $request->id)->first();

        $user->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
