<?php

namespace App\Http\Controllers;

Use App\Games;
Use App\Battles;
Use App\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BattlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Games::all();

        // Get all battles and sort by played_date desc.
        // By doing this the newest games will view at the top of the list in the view
        $battles = Battles::orderBy('played_date', 'desc')->get();

        return view('battles.index', compact('games', 'battles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $games = Games::all();
        $users = User::all();
        $temp_users = DB::table('temp_users')->get();

        return view('battles.create', compact('id', 'games', 'users', 'temp_users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $games = Games::all();

        // Put all request data from the create form in a variable
        $battleInfo = $request->except('_token'); // get all request data except the token
        $game_id = $battleInfo['game_id']-1; // retrieved game_id minus 1 for the $games_array

        // Get an array of the played game and put it in an $game variable
        $game = $games[$game_id];

        // Loop through the array of the users that are send through the request and count the users
        $selectedUsers = count($request->except('_token')['user_id']);

        // Get the min and maximum players that can join a battle
        $min_players = $game->min_players;
        $max_players = $game->max_players;

        // if the amount of users that are selected does not hit the
        // right amount of users for the battle then give a error message
        if($selectedUsers < $min_players) {
            return back()->with('message', 'You have not selected enough players. You need at least '.$min_players.' players to play '.$game->name.'.');
        } elseif($selectedUsers > $max_players) {
            return back()->with('message', 'You selected too many players. The maximum amount to play '.$game->name.' is '.$max_players.' players.');
        }

        // Create an array to insert the created battle data in the battles table
        $battleInput = ['name' => $battleInfo['name'], 'game_id' => $game->id, 'games_id' => $game->id];
        $i = 1;
        foreach($battleInfo['user_id'] as $user_id) {
            $battleInput["player{$i}"] = $user_id;
            $i++;
        }

        // insert the array with the $battleInput received from the create route in the battles Table
        DB::table('battles')->insert($battleInput, true);

        return redirect(url("/battles"));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // Put all request data from the create form in a variable
        $updateScores = $request->except(['_token', '_method']);

        // Create an array to update the scores in the battles table
        $battleScore = ['won_by' => $updateScores['won_by']];
        $i = 1;
        foreach($updateScores['score'] as $score) {
            $battleScore["score{$i}"] = $score;
            $i++;
        }

        // update the table with the $battleInput received from the show route in the battles Table
         DB::table('battles')->where('id', $updateScores['id'])->update($battleScore);

        // redirect back to the battles.index and send a success message
        return redirect( url('/battles'))->with('message', 'You have added scores to battle with id: '.$updateScores['id'].', hooray!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\battles $battles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $battles = Battles::all();

        return view('battles.show', compact('battles', 'id', 'battles'));
    }
}