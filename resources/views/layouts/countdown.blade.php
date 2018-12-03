<p id="countdown"></p>

<?php
date_default_timezone_set('Europe/Amsterdam');
// Get the countdown table, reverse and get the row of the top (lastRow)
$countdown = DB::table('countdowns')->orderBy("created_at", "desc")->first();

// Get the integer in the mySQL db
if(DB::table('countdowns')->count() > 0){
$minutes = $countdown->round_minutes;
$created_at = strtotime($countdown->created_at);
$paused_at = strtotime($countdown->paused_at);
echo gmdate("i:s", $countdown->resumed_seconds);
}

?>

    <script>
    // Set the date we're counting down to
    var countDownDate = <?php 
     if (DB::table('countdowns')->count() > 0 && $countdown->resumed_seconds) {
        echo strtotime(date( "H:i:s", strtotime(date("H:i:s"))+($countdown->resumed_seconds)));
    } else if(DB::table('countdowns')->count() > 0){
        echo strtotime('+ ' . $minutes . 'minutes', $created_at); 
        }  
        ?> * 1000;
    var now = <?php echo time() ?> * 1000;


    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        now = now + 1000;

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for minutes and seconds
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="countdown"
        document.getElementById("countdown").innerHTML = "<strong>Tijd over: </strong>" +
            minutes + ":" + seconds;

        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Einde ronde!";
        }
    }, 1000); 
    </script>    


<!-- Display Countdown Timer -->            
            <div>
                <form action="/countdown" method="post">
                {{ csrf_field() }}
                <input type="text" name="time" placeholder="Ronde tijd" required>
                <button id="start-btn" class="btn btn-success btn-sm">Start game</button>
                </form>
                
                <?php 
                if(DB::table('countdowns')->count() > 0){
                if (!$countdown->resumed_seconds || !$countdown->played_seconds) { ?>
                <form action="/cdpause" method="post">
                {{ csrf_field() }}

                <button id="stop-btn" class="btn btn-warning btn-sm">Pause game</button>
                </form>
                <?php } else if ($countdown->resumed_seconds) { ?>
                <form action="/cdresume" method="post">
                {{ csrf_field() }}

                <button id="reset-btn" class="btn btn-yellow btn-sm">Resume game</button>
                </form>
                <?php } 
            } ?>
            </div> 