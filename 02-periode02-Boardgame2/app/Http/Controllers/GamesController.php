<?php

namespace App\Http\Controllers;

use App\Games;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Show all games available in the database on the index page
        $games = Games::all();

        return view('games.index', compact('games'));
    }
}
