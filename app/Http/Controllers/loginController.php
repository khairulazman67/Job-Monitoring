<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(){
        return view('auth.login');
    }
}
