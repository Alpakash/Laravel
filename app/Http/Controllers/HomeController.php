<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\News;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
    }

    public function mail()
    {
        return view('mails');
    }


    public function news()
    {
        return view('welcome-links.news')->with('news',News::all());
    }

    public function faq()
    {
        return view('welcome-links.faq');
    }

    public function scores()
    {
        $calculation = new \App\Calculation();

        $users_table = DB::table('users')
            ->join('tables_users', 'users.id', '=', 'tables_users.user_id')
            ->select('users.*', 'tables_users.table_id', 'tables_users.tournament_points')
            ->orderBy('table_id')
            ->orderBy('tournament_points', 'desc')
            ->where('role_id', 3)
            ->get()
            ->toArray();

        $totalUsers = count($users_table);
        $usersPerTable = $calculation->tablesPreliminaryRoundRandom($users_table, $calculation->tableSize($totalUsers));
        $totalTables = count($usersPerTable);

        $usersPerTable = $calculation->tablesPreliminaryRound($users_table, $calculation->tableSize($totalUsers));


        return view('welcome-links.scores', compact('users_table','totalUsers', 'totalTables', 'usersPerTable'));
    }

    public function generateTables() {
        $calculation = new \App\Calculation();

        $calculation->generateTables();


        return redirect('/scores');
    }

    public function assignGamePoints(Request $request)
    {
        foreach ($request->except('_token') as $id => $points) {
        DB::table('tables_users')
            ->where('user_id', $id)
            ->update(['game_points' => $points]);
       }

        return redirect('/scores');
    }

    public function admins()
    {
        return view('admins');
    }

    public function judge() {
        return view('judge');
    }
}
