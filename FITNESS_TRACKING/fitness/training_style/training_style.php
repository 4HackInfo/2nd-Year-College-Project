<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Choose Training Style</title>
  <script src="../../fitness/music_generator/music_api/music_player.js" defer></script>
  <link rel="stylesheet" href="../../fitness/music_generator/music_api/music_style.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: url('../../assets/background.jpg') no-repeat center center fixed;
      background-size: cover;
      background-color: rgba(0, 0, 0, 0.67);
      background-blend-mode: overlay;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .back-button {
      position: absolute;
      top: 20px;
      left: 20px;
      cursor: pointer;
    }

    .back-button img {
      width:60px;
      position: absolute;
      left: 0;
    }

    h1 {
      margin-top: 60px;
      color: white;
      letter-spacing: 2px;
      font-size: 24px;
    }

    .training-style-content {
      margin-top: 40px;
      display: flex;
      flex-direction: column;
      gap: 25px;
    }

    .style-card {
      width: 260px;
      height: 250px;
      background-color: white;
      border-radius: 20px;
      overflow: hidden;
      text-align: center;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      cursor: pointer;
      transition: transform 0.3s;
    }

    .style-card:hover {
      transform: scale(1.03);
      box-shadow: 0 0 5px white, 0 0 10px whitesmoke, 0 0 45px whitesmoke;
    }

    .style-card img {
      object-fit: cover;
    }

    .style-card:hover img {
      filter: drop-shadow(20px 2px rgba(0, 0, 0, 0.49));
      object-fit: cover;
    }


    .style-card p {
      font-size: 18px;
      font-weight: bold;
      padding: 10px 0;
      color: #000;
    }

    iframe,
    audio {
      display: none;
    }
    @media screen and (min-width:1100px) {
      
      body{
        height: 85vh;
        display: flex;
        justify-content: center;
      }
      .style-card img{
        margin-top: 25px;
      }
      .training-style-content{
        display: grid;
        grid-template-columns: auto auto auto;
        gap: 100px;
      }

      .style-card {
      width: 300px;
      height: 300px;
    }
    }
  </style>
</head>
<body>

  <div class="back-button" onclick="navigateTo('../../dashboard.php')">
    <img src="back.png" alt="Back" />
  </div>

  <h1>Choose Training Style</h1>

  <div class="training-style-content">
    <div class="style-card" onclick="navigateTo('cutting/cutting_selection.php')">
      <img src="cutting.png" alt="Cutting" />
      <p>Cutting</p>
    </div>

    <div class="style-card" onclick="navigateTo('bulking/bulking_selection.php')">
      <img src="bulking.png" alt="Bulking" />
      <p>Bulking</p>
    </div>

    <div class="style-card" onclick="navigateTo('cardio/cardio_selection.php')">
      <img src="cardio.png" alt="Cardiovascular" />
      <p>Cardiovascular</p>
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
  

    function navigateTo(page) {
      window.location.href = page;
    }
  </script>

</body>
</html>
