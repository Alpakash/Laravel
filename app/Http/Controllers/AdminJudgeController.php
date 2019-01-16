<?php

namespace App\Http\Controllers;

use App\Tempuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Redirect;

class AdminJudgeController extends Controller
{
    /**
     * Show user index page
     *
     */

    public function index(Request $request)
    {
        $roleid = 2;
        $users = User::where('role_id', '=', $roleid)->with(['Role'])->get();
        if(!$users) return Redirect::back()->with('msg-danger', 'gebruikers niet gevonden');
        return view('admin.users.index', compact('users', 'roleid'))->with('name', 'judges');
    }

    /**
     * Show user detail page
     * @id the id of the user
     */

    public function details($id)
    {
        $userColumns = ['id','name', 'lastName', 'email' , 'verified', 'email_verified_at', 'created_at', 'role_id'];
        $user = User::where([['id', '=', $id], ['role_id', '=', 2]])->with(['Role'])->first();
        if(!$user){
            return redirect('admin');
        }
        return view('admin.users.details', compact('user'))->with('name', 'judges');
    }
    /**
     * show user edit form
     *
     *
     */

    public function edit($id)
    {
        $user = User::where([['id', '=', $id], ['role_id', '=', 2]])->with(['Role'])->first();
        if(!$user){
            return redirect('admin');
        }
        return view('admin.users.edit', compact('user'))->with('name', 'judges');
    }

    /**
     * Store instance for the edit
     *
     *
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        $request->validate(User::$rules);
        $user->fill($input)->save();
        return Redirect::back()->with('msg-success','Deelnemer is geupdate.');
    }
}
