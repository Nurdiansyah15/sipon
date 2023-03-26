<?php

namespace App\Http\Controllers\WEB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Crypt;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->session()->get('sipon_session');
        $menu = Role::all();
        return view('web.dashboard', [
            'data' => Crypt::encryptString($data),
            'menu' => $menu
        ]);
    }
}
