<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Redirect;

class AdminUserController extends Controller
{
    /**
     * Show user index page
     *
     */

    public function index()
    {
        $users = User::where('role_id', '=', 3)->with(['Role'])->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show user detail page
     * @id the id of the user
     */

    public function details($id)
    {
        $userColumns = ['id','name', 'lastName', 'email' , 'verified', 'email_verified_at', 'created_at', 'role_id'];
        $user = User::where([['id', '=', $id], ['role_id', '=', 3]])->with(['Role'])->first();
        if(!$user){
            return redirect('admin');
        }
        return view('admin.users.details', compact('user'));
    }
    /**
     * show user edit form
     *
     *
     */

    public function edit($id)
    {
        $user = User::where([['id', '=', $id], ['role_id', '=', 3]])->with(['Role'])->first();
        if(!$user){
            return redirect('admin');
        }
        return view('admin.users.edit', compact('user'));
    }
    /**
     * Store instance for the edit
     *
     *
     */
    public function store(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        $request->validate(User::$rules);
        $user->fill($input)->save();
        return Redirect::back()->with('msg-success','Deelnemer is geupdate.');
    }

}
