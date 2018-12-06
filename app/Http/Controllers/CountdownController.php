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
        // Set timezone to Europe/Amsterdam
        date_default_timezone_set('Europe/Amsterdam');
        // Create new countdown object
        $countdown = new Countdown();
        // $tournament = new Tournament();
        
        // $tournament->countdowns->count();
        
        // Get the time out of the input filled in by judge
        $countdown->round_minutes = request('time');
        // set the timestamp at now at created_at row
        $countdown->created_at = now();
        
        $countdown->save();

        // redirect back to page with succesfully paused message
        return redirect('/judge?created=1');
    }

    public function reset() {
        // select the last row in the db by reversing the rows
        $countdown = \App\Countdown::orderBy("created_at", "desc")->first();

        // Get the by judge filled in round_minutes and multiply by 60 for seconds 
        $countdown->resumed_seconds = $countdown->round_minutes * 60;
        // make a new timestamp for created at
        $countdown->created_at = now();
        // set pause_timer to 0, show the first pause button
        $countdown->pause_timer = 0;

        $countdown->save();

        return redirect('/judge');
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
        date_default_timezone_set('Europe/Amsterdam');
        // select the last row in the db by reversing the rows
        $countdown = \App\Countdown::orderBy("created_at", "desc")->first();
        // set pause_timer to 3 and show pause2 button
        $countdown->pause_timer = 3;
        // update resumed_at timestamp to current time
        $countdown->resumed_at = now();

        $countdown->save();

        // redirect back to page with succesfully paused message
        return redirect('/judge');
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
        date_default_timezone_set('Europe/Amsterdam');
        // select the last row in the db by reversing the rows
        $countdown = \App\Countdown::orderBy("created_at", "desc")->first();
        // set paused_at row to timestamp of current time
        $countdown->paused_at = now();
        // set pause_timer to 1 and show resume button
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

        // redirect back to page with succesfully paused message
        return redirect('/judge?paused=1');
    }

    public function pause2 () {
        date_default_timezone_set('Europe/Amsterdam');
        // select the last row in the db by reversing the rows
        $countdown = \App\Countdown::orderBy("created_at", "desc")->first();
        // set pause_timer to 1 and show resume button
        $countdown->pause_timer = 1;
        // set paused_at row to timestamp of current time
        $countdown->paused_at = now();

        // variable resumed_at timestamp
        $resumedTime = strtotime($countdown->resumed_at);
        // variable paused_at timestamp
        $pausedTime = strtotime($countdown->paused_at);

        // get the difference of the two timestamps in seconds
        $leftOverTime = ($resumedTime - $pausedTime);

        // update the resumed_seconds row with the old timer that continues
        // and add the time that passes in between the pause and resume to the time that is lost
        $countdown->resumed_seconds = $countdown->resumed_seconds + $leftOverTime;

        $countdown->save();

        // redirect back to page with succesfully paused message
        return redirect('/judge?paused=1');
    }

    
}
