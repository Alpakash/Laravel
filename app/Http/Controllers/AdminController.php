<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showCreate()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        
    }
}
