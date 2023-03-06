<?php

namespace App\Http\Controllers\WEB;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function index()
    {
        return view('web.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nis' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {

            $user = User::where('nis', $credentials['nis'])->first();
            $token = $request->user()->createToken('sipontoken')->plainTextToken;

            $data = [
                'nis' => $user->nis,
                'token' => $token
            ];

            $request->session()->put('sipon_session', json_encode($data));

            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('failed', 'Login failed!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $request->session()->forget('sipon_session');

        return redirect('/');
    }
}
