<script>
        window.onload = () => {
            let hour = 00;
            let minute = 00;
            let seconds = 00;
            let totalSeconds = 2700;
            let intervalId = null;
            function startTimer() {
                --totalSeconds;
                minute = Math.floor((totalSeconds - hour * 3600) / 60);
                seconds = totalSeconds - (hour * 3600 + minute * 60);

                document.getElementById("minute").innerHTML = minute;
                document.getElementById("seconds").innerHTML = seconds;
            }
            document.getElementById('start-btn').addEventListener('click', () => {
                intervalId = setInterval(startTimer, 1000);
            })
            document.getElementById('stop-btn').addEventListener('click', () => {
                if (intervalId)
                    clearInterval(intervalId);
            });
            document.getElementById('reset-btn').addEventListener('click', () => {
                totalSeconds = 2700;
                document.getElementById("minute").innerHTML = '00';
                document.getElementById("seconds").innerHTML = '00';
            });
        }
    </script>


<!-- Display Countdown Timer -->


<span id="minute">00</span>:<span id="seconds" style="margin-right: 5px;">00</span>
            
            <div>
            <button id="start-btn" class="btn btn-success btn-sm">Start game</button>
            <button id="stop-btn" class="btn btn-warning btn-sm">Pause game</button>
            <button id="reset-btn" class="btn btn-danger btn-sm">Reset time</button>
            </div> 
