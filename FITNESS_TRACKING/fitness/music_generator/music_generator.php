<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Generator</title>
    <script src="music_api/music_player.js" defer></script>
    <link rel="stylesheet" href="music_api/music_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url(../../assets/background.jpg) no-repeat center fixed;
            background-size: cover;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.68);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100vh;
            
        }

        .container {
            text-align: center;
            width: 90%;
            max-width: 400px;
        }
        p{
            font-weight: 800;
        }
        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: white;
            letter-spacing: 5px;
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
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: pointer;
            transition: 0.3s;
        }

        .option:hover {
            background:rgb(255, 255, 255);
            box-shadow: 0 0 5px white, 0 0 20px whitesmoke;
        }

        .option img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .home-button {
            position: fixed;
            bottom: 20px;
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="back.png" alt="Back" class="back-button" onclick="navigateTo('../../dashboard.php')">
        <h1>Music Generator</h1>
        
        <div class="option" onclick="navigateTo('music_api/music_api.php')">
            <img src="music_generator.png" alt="Music API" >
            <p>Music API</p>
        </div>
        <div class="option" onclick="navigateTo('customize_playlist/customize_playlist.php')">
            <img src="customize_playlist.png" alt="Customize Playlist">
            <p>Customize Playlist</p>
        </div>
        <div class="option" onclick="navigateTo('customize_playlist/music_library/music_library.php')">
            <img src="music_library.png" alt="Music Library">
            <p>Music Library</p>
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
        
        function navigateTo(page){
            window.location.href = page;
        }
    </script>
</body>
</html>