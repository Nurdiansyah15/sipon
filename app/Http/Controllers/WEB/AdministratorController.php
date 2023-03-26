<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function index()
    {
        return view('administrator');
    }
}
