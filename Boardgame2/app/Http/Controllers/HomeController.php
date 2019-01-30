<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;
use App\Battles;
use App\Games;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(User $user) {
        // Search the battles database table to find a match with the logged in user in the player columns
        // Count how many rows are found with the users id in the table
        // Order by last played battle and get the ID. With this we will retreive the Last Played Game Name
           $lastPlayedBattle = DB::table('battles')->select('game_id')
           ->where('player1', '=', $user->id)
               ->orWhere('player2', '=', $user->id)
               ->orWhere('player3', '=', $user->id)
               ->orWhere('player4', '=', $user->id)
               ->orWhere('player5', '=', $user->id)
               ->orWhere('player6', '=', $user->id)
               ->orderBy('played_date')
           ->get()->last();

           // Use the last played battle id to retrieve the last played game name
        if(isset($lastPlayedBattle)) {
            $lastPlayedGame = $lastPlayedBattle->game_id;


        $lastGameName = DB::table('games')->select('name')
            ->where('id', '=', $lastPlayedGame)
            ->get()->last();

        // Search how many rows the user id is found in players columns. Count the rows, that is the amount
        // how many battles the user has played
        $battlesPlayed = DB::table('battles')->select('game_id')
            ->where('player1', '=', $user->id)
            ->orWhere('player2', '=', $user->id)
            ->orWhere('player3', '=', $user->id)
            ->orWhere('player4', '=', $user->id)
            ->orWhere('player5', '=', $user->id)
            ->orWhere('player6', '=', $user->id)
            ->get();

        // Search how many times the users id is found in the won_by column in battles table
        $battlesWon = DB::table('battles')->select('won_by')
            ->where('won_by', '=', $user->id)
            ->get();


        // Last played game
        $lastPlayedGame = $lastGameName->name;

        // Battles played
        $battlesPlayed = count($battlesPlayed);

        // Battles won
        $battlesWon = count($battlesWon);

        // Percentage winning ratio
        $winningRatio = round($battlesWon / $battlesPlayed * 100, 2);
        } else {
            // if there are no battles played by user.
            // set variables to null so the compact variables will not give an error
            $lastPlayedGame = null;
            $battlesPlayed = null;
            $battlesWon = null;
            $winningRatio = null;
        }

        // Search in the users table get the name where the id is the same as logged in user
        $username = DB::table('users')->select('name')
            ->where('id', '=', $user->id)
            ->get()->first();

        // Username
        $username = $username->name;

        return view('home', array_filter(compact('lastPlayedGame', 'battlesPlayed', 'battlesWon', 'winningRatio', 'username')));
    }


        public function stats(User $user) {
        // Search the battles database table to find a match with the logged in user in the player columns
        // Count how many rows are found with the users id in the table
        // Order by last played battle and get the ID. With this we will retreive the Last Played Game Name
        $lastPlayedBattle = DB::table('battles')->select('game_id')
            ->where('player1', '=', $user->id)
            ->orWhere('player2', '=', $user->id)
            ->orWhere('player3', '=', $user->id)
            ->orWhere('player4', '=', $user->id)
            ->orWhere('player5', '=', $user->id)
            ->orWhere('player6', '=', $user->id)
            ->orderBy('played_date')
            ->get()->last();

        // Use the last played battle id to retrieve the last played game name
        if(isset($lastPlayedBattle)) {
            $lastPlayedGame = $lastPlayedBattle->game_id;

        $lastGameName = DB::table('games')->select('name')
            ->where('id', '=', $lastPlayedGame)
            ->get()->last();

        // Search how many rows the user id is found in players columns. Count the rows, that is the amount
        // how many battles the user has played
        $battlesPlayed = DB::table('battles')->select('game_id')
            ->where('player1', '=', $user->id)
            ->orWhere('player2', '=', $user->id)
            ->orWhere('player3', '=', $user->id)
            ->orWhere('player4', '=', $user->id)
            ->orWhere('player5', '=', $user->id)
            ->orWhere('player6', '=', $user->id)
            ->get();

        // Search how many times the users id is found in the won_by column in battles table
        $battlesWon = DB::table('battles')->select('won_by')
            ->where('won_by', '=', $user->id)
            ->get();

        // Search
        $username = DB::table('users')->select('name')
            ->where('id', '=', $user->id)
            ->get()->first();

        // Username
        $username = $username->name;

        // Last played game
        $lastPlayedGame = $lastGameName->name;

        // Battles played
        $battlesPlayed = count($battlesPlayed);

        // Battles won
        $battlesWon = count($battlesWon);

        // Percentage winning ratio
        $winningRatio = round($battlesWon / $battlesPlayed * 100, 2);
        } else {
            // if there are no battles played by user.
            // set variables to null so the compact variables will not give an error
            $lastPlayedGame = null;
            $battlesPlayed = null;
            $battlesWon = null;
            $winningRatio = null;
        }

            // Search in the users table get the name where the id is the same as logged in user
            $username = DB::table('users')->select('name')
                ->where('id', '=', $user->id)
                ->get()->first();

            // Username
            $username = $username->name;


            return view('stats', array_filter(compact('lastPlayedGame', 'battlesPlayed', 'battlesWon', 'winningRatio', 'username')));
    }


    public function games2()
    {
        $battles = Battles::all();
        $games = Games::all();

        // Count how many battles are played in total in the whole battles table
        $totalBattlesPlayed =
            count($games[0]->battle) +
            count($games[1]->battle) +
            count($games[2]->battle);

        return view('games.games2', compact('battles', 'games', 'totalBattlesPlayed'));
    }

    public function got()
    {
        // use an inner join in the games table to retrieve all battles of the boardgame Game of Thrones
        $battles = DB::table('games')
            ->join('battles', 'battles.game_id', '=', 'games.id')
            ->where('game_id', 1)
            ->get(['games.name AS game_name', 'games.id AS game_id', 'battles.*']);

        return view('battles.overview.got2003', compact('battles'));
    }

    public function wow()
    {
        // use an inner join in the games table to retrieve all battles of the boardgame World of Warcraft
        $battles = DB::table('games')
            ->join('battles', 'battles.game_id', '=', 'games.id')
            ->where('game_id', 2)
            ->get(['games.name AS game_name', 'games.id AS game_id', 'battles.*']);

        return view('battles.overview.wow2005', compact('battles'));
    }

    public function lotr()
    {
        // use an inner join in the games table to retrieve all battles of the boardgame Lord of the Rings
        $battles = DB::table('games')
            ->join('battles', 'battles.game_id', '=', 'games.id')
            ->where('game_id', 3)
            ->get(['games.name AS game_name', 'games.id AS game_id', 'battles.*']);

        return view('battles.overview.lotr2000', compact('battles'));
    }

}
