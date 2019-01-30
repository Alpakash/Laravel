<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource. /players route
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = DB::table('users')
            ->orderBy('created_at', 'desc')
            ->get();


        $temp_users = DB::table('temp_users')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('players.index', compact('users','temp_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $insertUser = $request->except('_token');

        DB::table('temp_users')->insert([
            'email' => $insertUser['email'],
            'name' => $insertUser['name']
        ], true);

        return redirect( url('/players'))->with('message', 'You updated your name/email, good job!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact( 'user'));
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
$updateProfile = $request->except(['_token', '_method']);
        DB::table('users')->where('id', $id)->update([
            'email' => $updateProfile['email'],
            'name' => $updateProfile['name']
        ]);

        return redirect( url('/players'))->with('message', 'You updated your name/email, good job!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect(url('/players'))->with('message', 'The user with id: ' . $id . ' is deleted succesfully, good job!');
    }
}
