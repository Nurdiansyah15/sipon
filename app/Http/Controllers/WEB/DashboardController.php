<?php

namespace App\Http\Controllers\WEB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Santri;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->session()->get('sipon_session');
              
        // $menu = Role::all();
        $santri=Santri::where(['nis'=>Auth::user()->nis_santri])->first();
        $menu= DB::table('role_user')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->where('role_user.user_id','=',Auth::user()->id)
            ->orderBy('roles.id')
            ->get();
            
            
        return view('web.dashboard', [
            'data' => Crypt::encryptString($data),
            'menu' => $menu,
            'userlogin'=>$santri,
        ]);
    }
}
