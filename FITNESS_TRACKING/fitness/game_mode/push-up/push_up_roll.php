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
        .back-button{
            width: 100;
            height: 10px;
        }
        
        @media screen and (max-width:800px) {
            
        }
    </style>
</head>
<body>

    <div class="back-button" onclick="navigateTo('../push-up.php')">
        <img src="../../../assets/back.png" alt="">
    </div>
    
    <div class="container">
        <h2>ROLL THE DICE CHALLENGE</h2>
        <p>Roll a dice to determine how many push-ups you will do!</p>
        <img id="diceImage" src="dice-1.png" width="100">
        <br>
        <button onclick="rollDice()">ROLL A DICE</button>
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
    function rollDice() {
        let roll = Math.floor(Math.random() * 6) + 1;
        let pushUps = roll * 5;
        document.getElementById("diceImage").src = `dice-${roll}.png`;
        let resultDiv = document.getElementById("result");
        resultDiv.innerHTML = `You rolled a ${roll}!<br>Do ${pushUps} push-ups!`;
        resultDiv.style.display = "block";

        // Points based on dice roll
        let pointsToAdd = roll; // Roll value = Points (1 to 6)
        updateUserPoints(pointsToAdd);
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

    function navigateTo(pages){
        window.location.href = pages;
    }
</script>

</body>
</html>
