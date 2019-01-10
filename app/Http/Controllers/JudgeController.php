<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;

class JudgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isJudge()) {
            $users = User::where('role_id',1)->get();
            return view('judge.index')->with('users',$users);
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
        return view('judge.create');
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
           //Validate name, email and password fields
        $this->validate($request, [
        'name'=>'required|max:40',
         'lastname'=>'required|max:40',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:6|confirmed'
        ]);
        $role=Role::where('role','Judge')->first();
        $input=$request->all();
        $input['role_id']=$role->id;
        $input['password']=bcrypt($input['password']);
        User::create($input);
        return redirect()->route('judge.index')->with('flash_message','Judge successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role=Role::where('role','Judge')->first();
        $user=User::where('role_id',$role->id)->findorFail($id);
        return view('judge.edit')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role=Role::where('role','Judge')->first();
        $user=User::where('role_id',$role->id)->findorFail($id);
        return view('judge.edit')->with('user',$user);
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

        $role=Role::where('role','Judge')->first();
        $user = User::where('role_id',$role->id)->findOrFail($id);
        $input = $request->all();
        $user->fill($input)->save();
        return redirect()->route('judge.index')->with('flash_message','Judge successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::where('role','Judge')->first();
        $user = User::where('role_id',$role->id)->findOrFail($id);
        $user->delete();
        return redirect()->route('judge.index')->with('flash_message','Judge successfully Removed.');
    }
}
