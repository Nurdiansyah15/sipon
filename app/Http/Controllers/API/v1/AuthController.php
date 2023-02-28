<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use App\Models\Santri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function login(Request $request)
    // {
    //     $fields = $request->validate([
    //         'nis' => 'required|string',
    //         'password' => 'required|string'
    //     ]);

    //     // Check NIS
    //     $user = User::where('nis_santri', $fields['nis'])->first();

    //     // Check password
    //     if (!$user || !Hash::check($fields['password'], $user->password)) {
    //         return response([
    //             'message' => 'Bad creds'
    //         ], 401);
    //     }

    //     $token = $user->createToken('sipontoken')->accessToken;

    //     $response = [
    //         'user' => $user,
    //         'token' => $token
    //     ];

    //     return response($response, 201);
    // }

    // public function logout(Request $request)
    // {
    //     $request->user()->tokens()->delete();

    //     return [
    //         'message' => 'Logged out'
    //     ];
    // }
}
