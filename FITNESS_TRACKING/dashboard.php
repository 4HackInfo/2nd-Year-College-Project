<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <script src="fitness/music_generator/music_api/music_player.js" defer></script>
    <link rel="stylesheet" href="fitness/music_generator/music_api/music_style.css">

    <style>
        body {
            margin: 0;
            width: 100%;
            height: 100vh;
            background: url(assets/background.jpg) no-repeat center fixed;
            background-size: cover;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.75);
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
      
        .card {
            width: 60%;
            height: 20vh;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            text-decoration: none;
        }

        .card img {
            max-width: 80%;
            max-height: 60%;
        }

        .card::before {
            content: attr(data-title);
            font-family: 'Courier New', Courier, monospace;
            font-size: 18px;
            text-align: center;
            color: black;
            font-weight: 800;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
   

        .footer-nav {
            width: 100%;
            height: 10vh;
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.1);
            position: absolute;
            bottom: 0;
        }

        .footer-icon {
            background-color: white;
            padding: 10px;
            border-radius: 10%;
        }
        iframe{
            display: none;
        }
        audio{
            display: none;
        }

        /*MOBILE VIEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEW*/
        @media screen and (max-width:1110px) {
        .footer-nav{
            background-color:rgba(0, 0, 0, 0.29);
        }
        .main{
                margin-top: 50px;
        }
        .card{
            margin-top: 30px;
        }
            .food_recommendation, .nutrition_recommendation, .home, .progress_monitoring, .leaderboard, .about{
            background-position: center;
            background-repeat: no-repeat;
            background-size:contain;
            width: 25px;
            height: 25px;
            border: 1px solid white;
            padding: 10px;
            border-radius: 100%;
            box-shadow: 0 0 10px whitesmoke;
        }
        .food_recommendation{
            background-image: url(assets/recommendation.png);
        }
        .nutrition_recommendation{
            background-image: url(assets/nutrition_alert.png);
        }
        .home{
            background-image: url(assets/home.png);
        }
        .progress_monitoring{
            background-image: url(assets/monitoring_progress.png);
        }
        .leaderboard{
            background-image: url(assets/ranking.png);
        }
        .about{
            background-image: url(assets/about.png);
        }
        h2{
            display: none;
        }
        }

        /*DESKTOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOP VIEEWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW*/
        @media screen and (min-width:1115px){

        body{
            background-image: url(assets/background.jpg);
            background-blend-mode: color-burn;
            background-color:rgba(19, 11, 11, 0.57);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        .header-nav{
        display: none;
        }

        .main{
        width: 100%;
        height: 100vh;
        display: grid;
        grid-template-columns: auto auto auto;
        align-content: center;
        justify-items: center;
        }

        .card{
            padding: 50px;
            transition: all 52ms ease-in-out;
        }
        .card:hover{
            padding: 60px;
            border: 2px solid black;
            box-shadow: 0 0 20px white;
            
        }
        .content-image{
            height: 100%;
           
        }
        
        .card::before {
            content: attr(data-title);
            font-family: 'Courier New', Courier, monospace;
            font-size: 25px;
            text-align: center;
            color: black;
            font-weight: 800;
        }

        .footer-nav{
            background-color:rgba(0, 0, 0, 0.57);
            display:flex;
            justify-content:space-evenly;
            position: absolute;
            top: 0;
        }

        
        h2{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: white;
            cursor: pointer;
        }
        h2:hover{
            background:rgb(255, 255, 255);
            color: black;
            padding: 15px;
            border-radius: 20px;
        }
        
    }
        .logout:hover{
            background-color:rgb(179, 28, 28);
            padding: 5px;
            border-radius: 100%;
        }
    </style>
</head>
<body>


<div class="main">
    <a href="fitness/game_mode/game_mode.php" class="card" data-title="Game Mode">
        <img src="assets/game.png" alt="game-icon" class="content-image">
    </a>

    <a href="fitness/training_style/training_style.php" class="card" data-title="Training Style">
        <img src="assets/training.png" alt="training-icon" class="content-image">
    </a>

    <a href="fitness/music_generator/music_generator.php" class="card" data-title="Music Generator">
        <img src="assets/music.png" alt="music-icon" class="content-image">
    </a>
</div>



<div class="footer-nav">
    
<div class="food_recommendation" onclick="navigateTo('food_recommendation.php')"><h2>Food Recommendation</h2></div>
<div class="nutrition_recommendation" onclick="navigateTo('nutrition_alert.php')"> <h2>Nutrition Alert</h2></div>
<div class="progress_monitoring" onclick="navigateTo('progress_monitoring.php')"><h2>Progress Monitoring</h2></div>
<div class="leaderboard" onclick="navigateTo('leaderboard.php')"><h2>Leaderboard</h2></div>
<div class="about" onclick="navigateTo('about.php')"><h2>About Us</h2></div>
<div class="logout" onclick="navigateTo('php/logout_process.php')"><img src="assets/logout.png" alt="logout_button" width="50"></div>
</div>
<iframe src="api.php" name="musicFrame" style="width: 100%; height: 80px; border: none; position: fixed; bottom: 0; left: 0;"></iframe>
<audio id="audioPlayer" controls></audio>
 
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
    document.addEventListener("DOMContentLoaded", function () {
    let player = document.getElementById("audioPlayer");
    let currentTrack = localStorage.getItem("currentTrack");
    let playbackTime = localStorage.getItem("playbackTime") || 0;
    let isPlaying = localStorage.getItem("isPlaying") === "true";

    if (currentTrack) {
        let tracks = JSON.parse(localStorage.getItem("tracks")) || [];
        if (tracks[currentTrack]) {
            player.src = tracks[currentTrack].preview;
            player.currentTime = playbackTime;
            if (isPlaying) player.play();
        }
    }

    setInterval(() => {
        if (!player.paused) {
            localStorage.setItem("playbackTime", player.currentTime);
        }
    }, 1000);
});

function navigateTo(pages){
    window.location.href = pages;
}
</script>

</body>
</html>
