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
            'nis_santri' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('nis_santri', $request->nis_santri)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'nis_santri' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('sipontoken')->plainTextToken;

        $response = [
            'nis' => $user->nis_santri,
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
