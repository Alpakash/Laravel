<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

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
        $tablesUsers = DB::table('tables_users')
            ->where('user_id', Auth::user()->id)
            ->get()
            ->first();

    if(isset($tablesUsers)) {
        $users_table = DB::table('users')
            ->join('tables_users', 'users.id', '=', 'tables_users.user_id')
            ->select('users.*', 'tables_users.table_id', 'tables_users.tournament_points')
            ->where('role_id', 3)
            ->where('table_id', $tablesUsers->table_id)
            ->get()
            ->toArray();
        } else {
            $users_table = null;
        }

        return view('profile', array_filter(compact('users_table')));
    }

    public function judge()
    {
        return view('welcome-links.judges');
    }
}
