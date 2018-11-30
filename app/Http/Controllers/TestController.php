<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use AuthenticatesUsers;


    public function index()
    {
        return view('welcome');
    }


    public function error()
    {
        return view('errors.503');
    }
}
