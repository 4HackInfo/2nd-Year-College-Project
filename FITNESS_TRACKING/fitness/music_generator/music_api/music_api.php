<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Generator</title>
    <script src="music_player.js" defer></script>
    <link rel="stylesheet" href="music_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: url(../../../assets/background.jpg) no-repeat center fixed;
            background-size: cover;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.66)
        }

        .container {
            text-align: center;
            width: 90%;
            max-width: 400px;
            color: white;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            letter-spacing: 10px;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
        }

        .option {
            background:rgb(255, 255, 255);
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
            color: black;
        }

        .option:hover {
            background: rgb(255, 255, 255);
            box-shadow: 0 0 10px white, 0 0 20px whitesmoke;
        }

        .option img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
            margin-top: 20px;
        }
        
    </style>
</head>
<body>

<div class="container">
    <img src="../back.png" alt="Back" class="back-button" onclick="navigateTo('../music_generator.php')">
    <h1>Music API</h1>

    <div class="option" onclick="navigateTo('rock.php')">
        <img src="../rock.png" alt="Rock">
        <p>Rock Music</p>
    </div>

    <div class="option" onclick="navigateTo('pop.php')">
        <img src="../pop.png" alt="Pop">
        <p>Pop Music</p>
    </div>
</div>

<!-- Floating Music Player -->
<div id="floatingPlayer" class="floating-player collapsed">
    <button id="togglePlayer" class="toggle-btn">
        <span id="toggleIcon"></span>
    </button>

    <div class="player-content">
        <button id="playPauseBtn"></button>
        <span class="track-title"></span>
        <audio id="audioPlayer" src="your-music.mp3"></audio>
    </div>
</div>

<script>
    function navigateTo(page){
        window.location.href = page;
    }
</script>

</body>
</html>
