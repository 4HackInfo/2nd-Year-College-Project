<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../../../fitness/music_generator/music_api/music_player.js" defer></script>
    <link rel="stylesheet" href="../../../fitness/music_generator/music_api/music_style.css">

    <style>
        body {
            margin: 0;
            width: 100%;
            height: 110vh;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.67);
            background-image: url(../../../assets/background.jpg);
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
        
        
        .cutting-selection{
            width: 100%;
            height: 50vh;
            display: grid;
            grid-template-rows: 300px 300px 300px;
            justify-content: center;
        }
       

        .cutting-beginner, .cutting-intermediate, .cutting-advanced{
            position: relative;
        }

        .cutting-beginner::before, .cutting-intermediate::before, .cutting-advanced::before{
            background-color:rgba(0, 0, 0, 0.72);
            border-radius: 0 0 10px 10px;
            color: white;
            position: absolute;
            text-align: center;
            bottom: 45px;
            width: 303px;
            padding: 20px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        .cutting-beginner::before{
            content: "Beginner";
        }
        .cutting-intermediate::before{
            content: "Intermediate";
        }
        .cutting-advanced::before{
            content: "Advanced";
        }

        .cutting-beginner img:hover, .cutting-intermediate img:hover, .cutting-advanced img:hover{
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
            width: 50px;
            top: 20px;
            left: 40px;
        }
        .image{
            box-shadow: 0 0 2px white, 0 0 10px whitesmoke;
            border-radius: 10px;
        }
        .image:hover{
            box-shadow: 0 0 10px white, 0 0 25px whitesmoke;
        }
        
        /*MOBILE VIEW*/
        @media screen and (max-width:1100) {
            .cutting-selection{
            width: 100%;
            height: 100vh;
            display: grid;
            grid-template-rows: 300px 300px 300px;
            justify-content: center;
        }
        }
        /*DESKTOPP VIEWWW*/
        @media screen and (min-width : 1100px) {
            .cutting-selection{
            display: grid;
            grid-template-rows: 300px;
            justify-content: center;
            align-content: center;

        }
            .cutting-selection{
                display: grid;
                grid-template-columns: auto auto auto;
                gap: 50px;
                justify-content: center;
            }
        }
     
    </style>
</head>
<body>

<div class="back-button" onclick="navigateTo('../training_style.php')">
        <img src="../back.png" alt="back_button-icon">
</div>

<span>
    <h1>CUTTING</h1>
</span>

<div class="main">

<div class="cutting-selection">

        <div class="cutting-beginner" onclick="navigateTo('cutting_beginner/cutting_beginner.php')">
             <img src="cutting_beginner.png" alt="cutting_beginner_image" class="image">
        </div>
        
        <div class="cutting-intermediate" onclick="navigateTo('cutting_intermediate/cutting_intermediate.php')">
            <img src="cuttting_intermediate.png" alt="cutting_intermediate_image" class="image">
        </div>

        <div class="cutting-advanced" onclick="navigateTo('cutting_advanced/cutting_advanced.php')">
            <img src="cutting_advanced.png" alt="cutting_advanced_image" class="image">
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
