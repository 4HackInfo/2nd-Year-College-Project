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
            height: 100vh;
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
            height: 80vh;
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
            display: grid;
            grid-template-rows: 250px 250px 250px;
            justify-content: center;
        }

        .push-up, .burpees, .plank{
            position: relative;
            color:rgba(255, 255, 255, 0);
            bottom: 36px;
            width: 260px;
            padding: 20px;
            
        }

        .push-up:hover::before, .burpees:hover::before, .plank:hover::before{
            background-color:rgba(0, 0, 0, 0.85);
            border-radius: 0 0 10px 10px;
            color: white;
            position: absolute;
            text-align: center;
            bottom: 15px;
            width: 260px;
            padding: 20px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .push-up::before{
            content: "Push Up";
        }
        .burpees::before{
            content: "Burpees";
        }
        .plank::before{
            content: "Plank";
        }

        .push-up img:hover, .burpees img:hover, .plank img:hover{
            border: 1px solid white;
            border-radius: 10px;
            transition: all 0.5ms ease-in-out;
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
            box-shadow: 0 0 5px #ffffff, 0 0 10px whitesmoke ;
            border-radius: 10px;
        }

        .image:hover{
            box-shadow: 0 0 10px white, 0 0 40px whitesmoke;
        }

        @media screen and (min-width:1110px) {
            
            .game-mode-container{
                height: 50vh;
                display: grid;
                grid-template-columns: auto auto auto;
                grid-template-rows: 250px;
                align-content: center;
                gap: 50px;
            }
        }
     
    </style>
</head>
<body>

<div class="back-button" onclick="navigateTo('../../dashboard.php')">
        <img src="../../assets/back.png" alt="back_button-icon">
</div>

<span>
    <h1>Game Mode</h1>
</span>

<div class="main">

<div class="game-mode-container">

        <div class="push-up" onclick="navigateTo('push-up.php')">
             <img src="../../assets/push_up.png" alt="" class="image">
        </div>
        
        <div class="plank" onclick="navigateTo('plank.php')">
            <img src="../../assets/plank.png" alt="plank-man" class="image">
        </div>

        <div class="burpees" onclick="navigateTo('burpees.php')">
            <img src="../../assets/burpees.png" alt="burpees-up man" class="image">
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
