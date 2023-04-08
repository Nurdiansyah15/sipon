<?php

namespace App\Http\Controllers\WEB;

use App\Models\Santri;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdministratorController extends Controller
{
    public function index()
    {
        $santri = Santri::where(['nis' => Auth::user()->nis_santri])->first();
        $users = User::with('roles', 'santri')->get();
        $roles = Role::all();

        // dd($users);

        return view('web.super-admin', [
            'userlogin' => $santri,
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
