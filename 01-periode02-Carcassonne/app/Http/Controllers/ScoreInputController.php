<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class ScoreInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($table_id)
    {
    $calculation = new \App\Calculation();

        $users_table = DB::table('users')
            ->join('tables_users', 'users.id', '=', 'tables_users.user_id')
            ->select('users.*', 'tables_users.table_id', 'tables_users.game_points')
            ->orderBy('table_id')
            ->where('role_id', 3)
            ->get()
            ->toArray();


        $totalUsers = count($users_table);
        $usersPerTable = $calculation->tablesPreliminaryRound($users_table, $calculation->tableSize($totalUsers));

        if (Auth::user()->isJudge() || Auth::user()->isAdmin()) {
            return view('scoreinput', compact('table_id', 'users_table', 'usersPerTable'));
        } else {
            return redirect('/');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
