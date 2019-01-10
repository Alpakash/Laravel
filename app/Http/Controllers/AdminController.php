<?php

namespace App\Http\Controllers;

use App\Temp;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\User;
use Illuminate\Support\Facades\Auth;
use Dotenv\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        // select al users
        $users = User::where('role_id', '=', 3)->OrderBy('created_at', 'desc')->take(5)->get();
        // select logged in user based on unique email
        $roleWithRole = User::where([['email','=', Auth::user()->email], ['name', '=', Auth::user()->name]])->with(['Role'])->first();
        $role = $roleWithRole->Role->role;
        return view('admin.index', compact('users', 'role'));
    }

    public function create()
    {
        return view('admin.add');
    }

    public function store(Request $request)
    {
        $hash = Hash::make(str_random(10));

        $request->validate([
            'email' => 'required|unique:users|max:255|email',
            'role_id' => 'required',
        ]);

        $inputs = array_merge($request->all(), ['hash' => $hash]);
        $saved = Temp::create($inputs);
        if($saved){
            $data = array('email'=>$inputs['email'], 'hash'=>$inputs['hash']);
            Mail::send('emails.addUser', $data, function($message) use($data)
            {
                $message->from('info@bounces.veggiecoder.com', 'Team11');
                $message->to($data['email'], 'Gebruiker')->subject('aacount aanmaken');
            });
        }
        return redirect()->back()->with('msg-success', 'Er is een mail verstuurd naar zojuist door u toegevoegde gebruiker');
        
    }
}
