<?php

namespace App\Http\Controllers;

use App\Countdown;
use Illuminate\Http\Request;

class CountdownController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countdown = new Countdown();

        $countdown->round_minutes = request('time');
        $countdown->created_at = now();

        $countdown->save();

        return redirect('/');
    }

    public function store() {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resume()
    {
        $countdown = \App\Countdown::orderBy("created_at", "desc")->first();
        $countdown->played_seconds = null;
        $countdown->updated_at = now();
        $countdown->save();
        
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function pause()
    {
        $countdown = \App\Countdown::orderBy("created_at", "desc")->first();
        $countdown->paused_at = now();

        $createdTime = strtotime($countdown->created_at);
        $pausedTime = strtotime($countdown->paused_at);
        $leftOverTime = ($pausedTime - $createdTime);
        $countdown->played_seconds = intval($leftOverTime);

        // Judge voert deze round minutes in en deze wijzigen niet
        $round_minutes = $countdown->round_minutes;
        // Aantal minuten gespeeld
        $played_seconds = $countdown->played_seconds;

        // update resumed seconds with the round second minus played seconds
        $countdown->resumed_seconds = $round_minutes * 60 - $played_seconds;

        $countdown->save();

        return redirect('/profile?paused=true');
  
    }

}
