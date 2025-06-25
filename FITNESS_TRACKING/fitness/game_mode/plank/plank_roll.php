<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roll The Dice Challenge</title>
    <script src="../../music_generator/music_api/music_player.js" defer></script>
    <link rel="stylesheet" href="../../music_generator/music_api/music_style.css">
    <style>
        body {
            width: 100%;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-image: url(../../../assets/background.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.81);
            display: flex;
            color: white;
            text-align: center;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background-color:rgba(0, 0, 0, 0.29);
            padding: 20px;
            border-radius: 10px;
            border: 1px solid white;
        }
        button {
            background-color: green;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            border-radius: 5px;
        }
        .result {
            margin-top: 15px;
            background-color: white;
            color: black;
            padding: 10px;
            border-radius: 5px;
            display: none;
        }
        #timerContainer {
            display: none;
            margin-top: 15px;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        #timerImage {
            width: 60px;
        }
        #timerText {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="back-button" onclick="navigateTo('../plank.php')">
        <img src="../../../assets/back.png" alt="">
    </div>

    <div class="container">
        <h2>ROLL THE DICE CHALLENGE</h2>
        <p>Roll a dice to determine how many seconds/minutes you will hold the plank!</p>
        <img id="diceImage" src="dice-1.png" width="100">
        <br>
        <button onclick="rollDice()">ROLL A DICE</button>
        <div id="timerContainer">
            <img id="timerImage" src="clock.png" alt="Timer Icon">
            <div id="timerText">0</div>
        </div>
        <div id="result" class="result"></div>
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
        let timerInterval;  // Declare timerInterval globally

        function rollDice() {
            let roll = Math.floor(Math.random() * 6) + 1;
            let seconds = roll * 10;  // Set timer based on dice roll (seconds)
            document.getElementById("diceImage").src = `dice-${roll}.png`;

            let resultDiv = document.getElementById("result");
            resultDiv.innerHTML = `You rolled a ${roll}!<br>Hold your plank for ${seconds} seconds!`;
            resultDiv.style.display = "block";

            document.getElementById("timerContainer").style.display = "flex";
            document.getElementById("timerText").textContent = seconds;

            // Clear any existing timer before starting a new one
            clearInterval(timerInterval);

            let startTime = Date.now();  // Capture the start time of the plank

            // Start the timer countdown
            timerInterval = setInterval(() => {
                let current = parseInt(document.getElementById("timerText").textContent);
                if (current > 0) {
                    document.getElementById("timerText").textContent = current - 1;
                } else {
                    clearInterval(timerInterval);
                    document.getElementById("timerText").textContent = "Time's up!";

                    // Calculate how long the user held the plank
                    let timeHeld = Math.floor((Date.now() - startTime) / 1000);  // Time in seconds

                    // Determine points based on time held (1 point per 5 seconds)
                    let points = Math.floor(timeHeld / 5);

                    // Send the points to PHP via AJAX after timer finishes
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "update_points.php", true);
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.onload = function () {
                        if (this.status == 200) {
                            console.log(this.responseText);  // Optional: for debugging
                        }
                    };
                    xhr.send("points=" + points);
                }
            }, 1000);
        }

        function navigateTo(pages){
            window.location.href = pages;
        }
    </script>
</body>
</html>
