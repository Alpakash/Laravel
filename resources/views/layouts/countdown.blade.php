<p id="countdown"></p>

<?php
date_default_timezone_set('Europe/Amsterdam');
// Get the countdown table, reverse and get the row of the top (lastRow)
$countdown = DB::table('countdown')->first();

// Get the integer in the mySQL db

$minutes = $countdown->duration;

$paused_at = $countdown->paused_at;


$currentTime = strtotime(date($paused_at, strtotime('now' . '+' . $minutes . ' minutes')));
?>




    <script>
    // Set the date we're counting down to
    var countDownDate = <?php echo $currentTime ?> * 1000;
    var now = <?php echo time() ?> * 1000;

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        now = now + 1000;

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
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
                <form action="cdcreate" method="post">
                {{ csrf_field() }}

                <button id="start-btn" class="btn btn-success btn-sm">Start game</button>
                </form>

                <form action="cdpause" method="post">
                {{ csrf_field() }}

                <button id="stop-btn" class="btn btn-warning btn-sm">Pause game</button>
                </form>

                <form action="cdupdate" method="post">
                {{ csrf_field() }}

                <button id="reset-btn" class="btn btn-danger btn-sm">Reset time</button>
                </form>
            </div> 
