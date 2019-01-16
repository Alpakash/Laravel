<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $users_table = DB::table('users')
            ->join('tables_users', 'users.id', '=', 'tables_users.user_id')
            ->select('users.*', 'tables_users.table_id', 'tables_users.tournament_points')
            ->orderBy('table_id')
            ->orderBy('tournament_points', 'desc')
            ->where('role_id', 3)
            ->get()
            ->toArray();



        return view('profile', compact('users_table'));
    }

    public function judge()
    {
        return view('welcome-links.judges');
    }
}
