<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(){
		return view('vb_auth/auth_login_center');
	}
}
