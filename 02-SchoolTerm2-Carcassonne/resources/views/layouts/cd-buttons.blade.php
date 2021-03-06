<?php
use \App\Countdown;
// Set timezone to Europe/Amsterdam
date_default_timezone_set('Europe/Amsterdam');
// Get the countdown table, reverse and get the row of the top (lastRow)
$countdown = Countdown::orderBy("created_at", "desc")->first();
?>


<!-- Display Countdown Timer -->            
<div class="mx-auto" style="width: 400px;">

    <form action="{{url('/countdown')}}" method="post">
        {{ csrf_field() }}
        <input class="form-control" type="number" name="time" placeholder="Round time" required>

        <div class="mx-auto" style="width: 200px;">

        <button id="start-btn" class="btn form-control btn btn-success btn-sm mb-2 mt-3" onclick="return confirm('Weet je zeker dat je de game wilt starten?');">Start new game</button>
    </form>

    @if(Countdown::count() > 0)
        @if (!$countdown->pause_timer)
            <form action="{{url('/cdpause')}}" method="post">
                {{ csrf_field() }}
                  <!-- This pause button is only one time, after click set pause_timer = 2 -->
                <button id="stop-btn" class="btn form-control btn btn-warning btn-sm mb-2">Pause game</button>
            </form>

            <!-- if the pause button is clicked and the pause is active, show resume button -->
        @elseif ($countdown->pause_timer == 1)
            <form action="{{url('/cdresume')}}" method="post">
                {{ csrf_field() }}

                <button id="reset-btn" class="btn form-control btn btn-secondary btn-sm mb-2">Resume game</button>
            </form>

            <form action="{{url('/cdreset')}}" method="post">
                {{ csrf_field() }}

                <button id="reset-btn" class="btn form-control btn btn-danger btn-sm mb-2" onclick="return confirm('Are you sure you want to reset the game?');">Reset game</button>
            </form>

             <!-- Show this pause button after the first pause - pause_timer == 2
                  Show this pause button after the resume      - pause_timer == 3

                  This pause2 button will check the difference between
                  the paused_at and resumed_at timestamps  -->

        @elseif ($countdown->pause_timer == 2 || $countdown->pause_timer == 3)
            <form action="{{url('/cdpause2')}}" method="post">
                {{ csrf_field() }}

                <button id="stop-btn" class="btn form-control btn btn-warning btn-sm mb-2">Pause game</button>
            </form>
        @endif
    @endif
</div>
</div>