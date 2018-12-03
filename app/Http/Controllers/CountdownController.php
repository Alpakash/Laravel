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

        return redirect('/judge?paused=true');
    }

    public function reset() {
        $countdown = \App\Countdown::orderBy("created_at", "desc")->first();

        $countdown->resumed_seconds = $countdown->round_minutes * 60;
        $countdown->created_at = now();
        $countdown->pause_timer = 0;

        $countdown->save();

        return redirect('/judge?paused=true');
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
        $countdown->pause_timer = 3;
        $countdown->resumed_at = now();

        $countdown->save();
        
        return redirect('/judge?paused=true');
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
        $countdown->pause_timer = 1;
        
        // get de created_at timestamp
        $createdTime = strtotime($countdown->created_at);
        // Get de paused_at timestamp
        $pausedTime = strtotime($countdown->paused_at);
        // Vergelijk de timestamps met elkaar
        $leftOverTime = ($pausedTime - $createdTime);
        // Het aantal gespeelde seconde is het verschil van de timestamps
        $countdown->played_seconds = intval($leftOverTime);
        // De ingevulde minutes van een round in een variable
        $round_minutes = $countdown->round_minutes;
        // Aantal minuten gespeeld in een variable
        $played_seconds = $countdown->played_seconds;

        // update seconden waarmee verder wordt gespeeld. roundtime - played time
        $countdown->resumed_seconds = $round_minutes * 60 - $played_seconds;

        $countdown->save();

        return redirect('/judge?paused=true');
    }

    public function pause2 () {
        $countdown = \App\Countdown::orderBy("created_at", "desc")->first();
        $countdown->pause_timer = 1;
        $countdown->paused_at = now();

        $resumedTime = strtotime($countdown->resumed_at);
        $pausedTime = strtotime($countdown->paused_at);

        $leftOverTime = ($resumedTime - $pausedTime);
        $countdown->resumed_seconds = $countdown->resumed_seconds + $leftOverTime;

        $countdown->save();

        return redirect('/judge?paused=true');
    }

    
}
