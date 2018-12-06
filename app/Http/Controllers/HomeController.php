<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function news()
    {
        return view('welcome-links.news');
    }

    public function faq()
    {
        return view('welcome-links.faq');
    }

    public function scores()
    {
        return view('welcome-links.scores');
    }
}
