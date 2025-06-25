<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beat The Clock Challenge</title>
    <script src="../../music_generator/music_api/music_player.js" defer></script>
    <link rel="stylesheet" href="../../music_generator/music_api/music_style.css">
    <style>
        body {
            width: 100%;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url(../../../assets/background.jpg);
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.83);
            display: flex;
            color: white;
            text-align: center;
        }
        .container {
            width: 50%;
            margin: auto;
            background: rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
            border: 1px solid white;
            box-shadow: 0 0 1px white, 0 0 2px whitesmoke;
            animation: fadeIn 2s ease-in-out infinite;
        }
        @keyframes fadeIn {
            30%{
                box-shadow: 0 0 10px white, 0 0 15px whitesmoke;
            }
            60%{
                box-shadow: 0 0 15px white, 0 0 40px whitesmoke;
            }
            90%{
                box-shadow: 0 0 20px white, 0 0 60px whitesmoke;
            }
        }
        button {
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            border-radius: 5px;
        }
        .timer-options button {
            background-color: #0044cc;
            margin: 5px;
        }
        #startButton {
            background-color: green;
        }
        #pauseButton {
            display: none;
            background-color: red;
        }
        .information-content p, .information-content h3{
            display:grid;
            align-self: flex-end;
            justify-self: left;
            text-align: left;
        }
        .back-button{
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>

    <div class="back-button" onclick="navigateTo('../push-up.php')">
        <img src="../../../assets/back.png" alt="">
    </div>
    <div class="container">
        <h2>BEAT THE CLOCK CHALLENGE</h2>
        <p><img src="clock.png" width="50"></p>
        <h1 id="timer">0:00</h1>
        <button id="startButton" onclick="startTimer()">START</button>
        <button id="pauseButton" onclick="pauseTimer()">PAUSE</button>
        
        <h3>Select Time:</h3>
        <div class="timer-options">
            <button onclick="setTimer(60)">1min</button>
            <button onclick="setTimer(120)">2min</button>
            <button onclick="setTimer(180)">3min</button>
        </div>
        <div class="information-content">
        <h3>How to Play</h3>
        <p>1. Set a timer for a specific duration.<br>
           2. Perform as many push-ups as possible.<br>
           3. Count the number of push-ups before the timer ends.</p> 
        </div>
    </div>

        <!-- Floating Music Player -->
<div id="floatingPlayer" class="floating-player collapsed">
    <button id="togglePlayer" class="toggle-btn">
        <span id="toggleIcon">></span>
    </button>

    <div class="player-content">
        <button id="playPauseBtn"></button>
        <span class="track-title"></span>
        <audio id="audioPlayer" src="your-music.mp3"></audio>
    </div>
</div>

<script>
    let countdown;
    let timeLeft = 0;
    let totalDuration = 0; // store original timer duration
    let isPaused = false;
    const timerDisplay = document.getElementById('timer');
    const startButton = document.getElementById('startButton');
    const pauseButton = document.getElementById('pauseButton');

    function setTimer(seconds) {
        timeLeft = seconds;
        totalDuration = seconds; // store the original duration
        updateDisplay();
    }

    function startTimer() {
        clearInterval(countdown);
        isPaused = false;
        startButton.style.display = "none";
        pauseButton.style.display = "inline-block";
        pauseButton.textContent = "PAUSE";
        pauseButton.style.backgroundColor = "red";

        countdown = setInterval(() => {
            if (timeLeft > 0 && !isPaused) {
                timeLeft--;
                updateDisplay();

                if (timeLeft === 0) {
                    clearInterval(countdown);
                    alert("Time's up! Count your push-ups!");

                    // Give points only once when timer ends
                    let pointsToAdd = 0;

                    if (totalDuration === 60) {
                        pointsToAdd = 5;
                    } else if (totalDuration === 120) {
                        pointsToAdd = 10;
                    } else if (totalDuration === 180) {
                        pointsToAdd = 15;
                    }

                    if (pointsToAdd > 0) {
                        updateUserPoints(pointsToAdd);
                    }

                    startButton.style.display = "inline-block";
                    pauseButton.style.display = "none";
                }
            }
        }, 1000);
    }

    function pauseTimer() {
        isPaused = !isPaused;
        pauseButton.textContent = isPaused ? "RESUME" : "PAUSE";
        pauseButton.style.backgroundColor = isPaused ? "green" : "red";
    }

    function updateDisplay() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
        timerDisplay.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    }

    function updateUserPoints(points) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "update_points.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function () {
            if (xhr.status == 200) {
                console.log("✅ " + xhr.responseText);
            } else {
                console.log("❌ Error: " + xhr.statusText);
            }
        };
        xhr.send("points=" + points);
    }

    function navigateTo(pages) {
        window.location.href = pages;
    }
</script>

</body>
</html>