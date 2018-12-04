<!-- show the countdown timer -->
<p id="countdown"></p>

<?php
// Set timezone to Europe/Amsterdam
date_default_timezone_set('Europe/Amsterdam');
// Get the countdown table, reverse and get the row of the top (lastRow)
$countdown = DB::table('countdowns')->orderBy("created_at", "desc")->first();

// Get the integer in the mySQL db, if theree is a row than assign variables
if(DB::table('countdowns')->count() > 0){
$minutes = $countdown->round_minutes;
$created_at = strtotime($countdown->created_at);
$paused_at = strtotime($countdown->paused_at);
$updated_at = strtotime($countdown->updated_at);

/** if there is a row and the timer is paused, show static timer
 * this timer shows the amount of left over seconds in date format i:s
*/
if (DB::table('countdowns')->count() > 0 && $countdown->pause_timer == 1) {
    echo "<strong>Paused at: </strong>" . gmdate("i:s", $countdown->resumed_seconds);
} }
?>

<!-- Javascript countdown timer start here-->
<script>
    // Set the date we're counting down to
    var countDownDate = <?php if(DB::table('countdowns')->count() > 0){
 if (DB::table('countdowns')->count() > 0 && $countdown->resumed_seconds || $countdown->pause_timer > 0) {
        echo strtotime('+ ' . $countdown->resumed_seconds . 'seconds', $updated_at); 
    } else if (DB::table('countdowns')->count() > 0 && $countdown->created_at) {
        echo strtotime('+ ' . $minutes . 'minutes', $created_at); 
        } }  ?> * 1000;
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
        <?php  if(DB::table('countdowns')->count() > 0){ 
            if (DB::table('countdowns')->count() > 0 && $countdown->pause_timer > 1 || $countdown->pause_timer == null) { ?>
        document.getElementById("countdown").innerHTML = "<strong>Time Left: </strong>" +
            minutes + ":" + seconds;
        <?php } }?>
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "The end!";
        }
    }, 1000); 
    </script>    