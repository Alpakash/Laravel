<?php

namespace App\Http\Controllers;

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
        DB::table('countdown')
        ->create(array(
            'duration' => $_POST("round_duration"), 
            'created_at' => now()->modify('+45 minutes'))
        );
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
        DB::table('countdown')
        ->create(array(
            'duration' => $_POST("round_duration"), 
            'updated_at' => now())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pause(Request $request, $id)
    {
        DB::table('countdown')
        ->update(array(
            'paused_at' => now())
        );
      
    }

}
