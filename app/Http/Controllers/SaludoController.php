<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class SaludoController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();

        return view('welcome', compact('roles'));
    }
}
