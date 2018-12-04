<?php
// Set timezone to Europe/Amsterdam
date_default_timezone_set('Europe/Amsterdam');
// Get the countdown table, reverse and get the row of the top (lastRow)
$countdown = DB::table('countdowns')->orderBy("created_at", "desc")->first();
?>


<!-- Display Countdown Timer -->            
<div class="mx-auto" style="width: 400px;">

                <form action="/countdown" method="post">
                {{ csrf_field() }}
                <input class="form-control" type="text" name="time" placeholder="Round time" required>
               
                <div class="mx-auto" style="width: 200px;">

                <button id="start-btn" class="btn form-control btn btn-success btn-sm mb-2 mt-3" onclick="return confirm('Are you sure you want to start the game?');">Start new game</button>

                </form>
                  
                <?php 

                if(DB::table('countdowns')->count() > 0){
                // show there is no pause, show the pause button
                if (!$countdown->pause_timer) { ?>
                <form action="/cdpause" method="post">
                {{ csrf_field() }}
                  <!-- This pause button is only one time, after click set pause_timer = 2 -->
                <button id="stop-btn" class="btn form-control btn btn-warning btn-sm mb-2">Pause game</button>
                </form>   

                <!-- if the pause button is clicked and the pause is active, show resume button -->
                <?php } else if ($countdown->pause_timer == 1) { ?>
                <form action="/cdresume" method="post">
                {{ csrf_field() }}

                <button id="reset-btn" class="btn form-control btn btn-secondary btn-sm mb-2">Resume game</button>
                </form>

                <form action="/cdreset" method="post">
                {{ csrf_field() }}

                <button id="reset-btn" class="btn form-control btn btn-danger btn-sm mb-2" onclick="return confirm('Are you sure you want to reset the game?');">Reset game</button>
                </form>

                 <!-- Show this pause button after the first pause - pause_timer == 2
                      Show this pause button after the resume      - pause_timer == 3
                      
                      This pause2 button will check the difference between 
                      the paused_at and resumed_at timestamps  -->

                <?php } else if ($countdown->pause_timer == 2 || $countdown->pause_timer == 3) { ?> 
              <form action="/cdpause2" method="post">
                {{ csrf_field() }}

                <button id="stop-btn" class="btn form-control btn btn-warning btn-sm mb-2">Pause game</button>
                </form>
                  <?php } } ?>
                  </div>
            </div> 