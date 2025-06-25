<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../music_generator/music_api/music_player.js" defer></script>
    <link rel="stylesheet" href="../music_generator/music_api/music_style.css">
    <style>
        body {
            margin: 0;
            width: 100%;
            height: 110vh;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.67);
            background-image: url(../../assets/background.jpg);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .header-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .menu-icon {
            width: 30px;
        }

        .profile-icon, .notification-icon {
            width: 30px;
            background-color: white;
            border-radius: 50%;
            padding: 5px;
        }

        .main {
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            padding-top: 20px;
        }

        span{
            display: flex;
            justify-content: center;
            color: white;
            font-family: 'Courier New', Courier, monospace;
            letter-spacing: 5px;
            text-decoration: underline;
            text-underline-offset: 10px;
        }
        .game-mode-container{
            width: 100%;
            height: 65vh;
            display: grid;
            grid-template-rows: 250px 250px;
            justify-content: center;
            align-content:space-between ;
        }
        .curl-up-clock img:hover{
            border: 1px solid white;
            border-radius: 10px;
        }
        .curl-up-roll img:hover{
            border: 1px solid white;
            border-radius: 10px;
        }
      
        iframe{
            display: none;
        }
        audio{
            display: none;
        }
        .back-button{
            position: relative;
            top: 20px;
            left: 40px;
        }

        .image{
            box-shadow: 0 0 1px white, 0 0 2px whitesmoke;
            border-radius: 10px;
        }
        .image:hover{
            box-shadow: 0 0 10px white, 0 0 20px whitesmoke;
        }

        @media screen and (max-width:1100px) {
            .game-mode-container{
                grid-template-rows: auto auto;
            }
        }
        @media screen and (min-width:1110px) {
            
            .game-mode-container{
                margin-top: 100px;
                height: 100vh;
                display: grid;
                grid-template-columns: auto auto;
                gap: 50px;
            }
            .image{
                width: 350px;

            }

        }
     
     
    </style>
</head>
<body>

<div class="back-button" onclick="navigateTo('game_mode.php')">
        <img src="../../assets/back.png" alt="back_button-icon">
</div>

<span>
    <h1>Game Mode</h1>
</span>

<div class="main">

<div class="game-mode-container">

        <div class="curl-up-clock" onclick="navigateTo('plank/plank_clock.php')">
            <img src="plank_clock.png" alt="clock-play" class="image">
        </div>
        
        <div class="curl-up-roll" onclick="navigateTo('plank/plank_roll.php')">
             <img src="plank_roll.png" alt="roll-play" class="image">
        </div>
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
function navigateTo(pages){
    window.location.href = pages;
}
</script>

</body>
</html>
