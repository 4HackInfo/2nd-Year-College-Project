<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 3 Workout</title>
  <script src="../../../../../fitness/music_generator/music_api/music_player.js" defer></script>
  <link rel="stylesheet" href="../../../../../fitness/music_generator/music_api/music_style.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
    }
    body {
      background: #f8f8f8;
      padding: 20px;
    }
    .container {
      max-width: 360px;
      margin: 0 auto;
      background: white;
      border-radius: 20px;
      overflow: hidden;
      padding: 20px;
    }
    .header {
      text-align: center;
      margin-bottom: 10px;
    }
    .header h2 {
      font-size: 24px;
      font-weight: bold;
    }
    .sub-header {
      font-size: 14px;
      color: gray;
    }
    .start-button {
      display: block;
      margin: 20px auto;
      padding: 10px 30px;
      background: #00c97b;
      color: white;
      border: none;
      border-radius: 20px;
      font-weight: bold;
      cursor: pointer;
    }
    .task {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 15px;
      overflow: hidden;
      background: #fff;
    }
    .task img {
      width: 100px;
      height: 80px;
      object-fit: cover;
    }
    .task-details {
      padding: 10px;
    }
    .task-details h4 {
      font-size: 16px;
      margin-bottom: 4px;
    }
    .task-details span {
      font-size: 14px;
      color: gray;
    }
    #taskPage {
      width: 100%;
      display: none;
      text-align: center;
    }
    #timer {
      font-size: 48px;
      margin-top: 20px;
      color: #00c97b;
    }
    #taskAnimation{
        display: flex;
        justify-self: center;   
    }
  </style>
</head>
<body>

<div class="back-button" onclick="navigateTo('../bulking_advanced.php')">
        <img src="../back5.png" alt="back_button-icon">
</div>

  <div class="container" id="mainPage">
    <div class="header">
      <h2>DAY 3</h2>
      <p class="sub-header">Bulking | Advanced</p>
    </div>
    <button class="start-button" onclick="startWorkout()">START</button>

    <div class="task-list">
      <div class="task"><img src="bodyweight_squats.jpg" alt="Bodyweight Squats"><div class="task-details"><h4>BODYWEIGHT SQUATS</h4><span>x20</span></div></div>
      <div class="task"><img src="bulgarian_splits.jpg" alt="Bulgarian Splits Squats"><div class="task-details"><h4>BULGARIAN SPLITS SQUADS</h4><span>x10 per leg</span></div></div>
      <div class="task"><img src="glute_bridges.jpg" alt="Glute Bridges"><div class="task-details"><h4>GLUTE BRIDGES</h4><span>x20</span></div></div>
      <div class="task"><img src="wall_sit.jpg" alt="Wall Sit"><div class="task-details"><h4>WALL SIT</h4><span>55 seconds</span></div></div>
      <div class="task"><img src="calf_raises.jpg" alt="Calf Raises"><div class="task-details"><h4>CALF RAISES</h4><span>55 seconds</span></div></div>
      <div class="task"><img src="bodyweight_squats.jpg" alt="Bodyweight Squats"><div class="task-details"><h4>BODYWEIGHT SQUATS</h4><span>x20</span></div></div>
      <div class="task"><img src="bulgarian_splits.jpg" alt="Bulgarian Splits Squats"><div class="task-details"><h4>BULGARIAN SPLITS SQUADS</h4><span>x10 per leg</span></div></div>
      <div class="task"><img src="glute_bridges.jpg" alt="Glute Bridges"><div class="task-details"><h4>GLUTE BRIDGES</h4><span>x20</span></div></div>
      <div class="task"><img src="wall_sit.jpg" alt="Wall Sit"><div class="task-details"><h4>WALL SIT</h4><span>55 seconds</span></div></div>
      <div class="task"><img src="calf_raises.jpg" alt="Calf Raises"><div class="task-details"><h4>CALF RAISES</h4><span>55 seconds</span></div></div>
      
    </div>
  </div>

  <div id="taskPage">
    <h2 id="currentTask">Task</h2>
    <p id="timer">60</p>
    <img id="taskAnimation" src="" alt="Exercise Animation" />
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
    const tasks = [
      "Bodyweight Squats x20",
      "Bulgarian Splits Squads x10 per leg",
      " Glute Bridges x20",
      "Wall Sit 55 seconds",
      "water_break",
      "Calf Raises 55 seconds",
      "Bodyweight Squats x20",
      "Bulgarian Splits Squads x10 per leg",
      "water_break",
      "Glute Bridges x20",
      "Wall Sit 55 seconds",
      "Calf Raises 55 seconds"
    ];
    const animations = {
       
      "Bodyweight Squats x20" : "bodyweight_squats.gif",
      "Bulgarian Splits Squads x10 per leg" : "bulgarian_splits.gif",
      "Glute Bridges x20" : "glute_bridges.gif",
      "Wall Sit 55 seconds" : "wall_sit.gif",
      "water_break" : "water_break.png",
      "Calf Raises 55 seconds" : "calf_raises.gif",
      "Bodyweight Squats x20" : "bodyweight_squats.gif",
      "Bulgarian Splits Squads x10 per leg" : "bulgarian_splits.gif",
      "water_break" : "water_break.png",
      "Glute Bridges x20" : "glute_bridges.gif",
      "Wall Sit 55 seconds" : "wall_sit.gif",
      "Calf Raises 55 seconds" : "calf_raises.gif",
    };
    let currentIndex = 0;
    let timer;
    let timeLeft = 55;

    function startWorkout() {
      document.getElementById("mainPage").style.display = "none";
      document.getElementById("taskPage").style.display = "block";
      loadTask(); // ✅ Start first task with animation
    }

    function loadTask() {
      if (currentIndex >= tasks.length) {
        document.getElementById("currentTask").innerText = "Workout Complete!";
        document.getElementById("taskAnimation").style.display = "none";
        document.getElementById("timer").innerText = "✔️";
        return;
      }

      const task = tasks[currentIndex];
      document.getElementById("currentTask").innerText = task;

      // ✅ NEW: Set animation if available
      const animationSrc = animations[task];
      if (animationSrc) {
        document.getElementById("taskAnimation").src = animationSrc;
        document.getElementById("taskAnimation").style.display = "block";
      } else {
        document.getElementById("taskAnimation").style.display = "none";
      }

      timeLeft = 55;
      document.getElementById("timer").innerText = timeLeft;

      clearInterval(timer);
      timer = setInterval(() => {
        timeLeft--;
        document.getElementById("timer").innerText = timeLeft;
        if (timeLeft <= 0) {
          currentIndex++;
          loadTask(); // ✅ Load next task and animation
        }
      }, 1000);
    }
    function navigateTo(pages){
        window.location.href = pages;
    }
  </script>
</body>
</html>
