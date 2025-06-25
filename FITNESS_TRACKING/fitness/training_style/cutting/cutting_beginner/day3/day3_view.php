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
    #taskAnimation {
      display: block;
      margin: 20px auto;
      width: 250px;
      height: 200px;
      object-fit: contain;
    }
    .control-buttons {
      margin-top: 10px;
    }
    .control-buttons button {
      background-color: #00c97b;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 20px;
      cursor: pointer;
      font-weight: bold;
    }

  </style>
</head>
<body>

<div class="back-button" onclick="navigateTo('../cutting_beginner.php')">
        <img src="../back.png" alt="back_button-icon">
</div>

  <div class="container" id="mainPage">
    <div class="header">
      <h2>DAY 3</h2>
      <p class="sub-header">Cutting | Beginner</p>
    </div>
    <button class="start-button" onclick="startWorkout()">START</button>

    <div class="task-list">
      <div class="task"><img src="squats.png" alt="Squats"><div class="task-details"><h4>Squats</h4><span>x 10</span></div></div>
      <div class="task"><img src="squats.png" alt="Squats"><div class="task-details"><h4>Squats</h4><span>x 10</span></div></div>
      <div class="task"><img src="side_lying_left.png" alt="side_lying_left"><div class="task-details"><h4>SIDE LYING LEG LIFT LEFT</h4><span> x 12</span></div></div>
      <div class="task"><img src="side_lying_right.png" alt="side_lying_right"><div class="task-details"><h4>SIDE LYING LEG LIFT RIGHT </h4><span>x 12</span></div></div>
      <div class="task"><img src="backward_lunges.png" alt="backward_lunges"><div class="task-details"><h4>Backward Lunges</h4><span> x 14</span></div></div>
      <div class="task"><img src="backward_lunges.png" alt="backward_lunges"><div class="task-details"><h4>Backward Lunges</h4><span> x 14</span></div></div>
      <div class="task"><img src="knee_to_chest.png" alt="knee to chest"><div class="task-details"><h4>Knee to Chest Stretch</h4><span> 25 seconds</span></div></div>
      <div class="task"><img src="calf_stretch.png" alt="calf_stretch"><div class="task-details"><h4>Calf Stretch Left</h4><span> 25 seconds</span></div></div>
      <div class="task"><img src="calf_stretch_right.png" alt="calf_stretch"><div class="task-details"><h4>Calf Stretch Right</h4><span> 25 seconds</span></div></div>
    </div>
  </div>

  <div id="taskPage">
  <h2 id="currentTask">Task</h2>
  <p id="timer">60</p>
  <img id="taskAnimation" src="" alt="Exercise Animation" />
  <div class="control-buttons">
    <button onclick="toggleTimer()">Pause</button>
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
    const tasks = [
      "Squats x10",
      "Squats x10",
      "SIDE LYING LEG LIFT LEFT x12",
      "Water Break",
      "SIDE LYING LEG LIFT RIGHT x12",
      "Backward Lunges x14",
      "Backward Lunges x14",
      "Water Break",
      "Knee to Chest Stretch 25 seconds",
    "calf stretch left 25 seconds",
    "calf stretch right 25 seconds",
    ];

    const animations = {
    "Squats x10" : "squats.gif",
    "Squats x10 ": "squats.gif",
    "SIDE LYING LEG LIFT LEFT x12" : "side_lying_leg_lift_left.gif",
    "Water Break" : "water_break.png",
    "SIDE LYING LEG LIFT RIGHT x12" : "side_lying_leg_lift_right.gif",
    "Backward Lunges x14" : "backward_lunges.gif",
    "Backward Lunges x14" : "backward_lunges.gif",
    "Water Break" : "water_break.png",
    "Knee to Chest Stretch 25 seconds" : "knee_to_chest.gif",
    "calf stretch left 25 seconds" : "calf_stretch.gif",
    "calf stretch right 25 seconds" : "calf_stretch_right.gif",
    };
    
    let currentIndex = 0;
    let timer;
    let timeLeft = 25;
    let isPaused = false;

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

      timeLeft = 25;
      document.getElementById("timer").innerText = timeLeft;

      startTimer();
    }
    function startTimer() {
      if (isPaused) return;

      clearInterval(timer);
      timer = setInterval(() => {
          if (!isPaused) {
              timeLeft--;
              document.getElementById("timer").innerText = timeLeft;
              if (timeLeft <= 0) {
                  currentIndex++;
                  loadTask();
              }
          }
      }, 1000);
  }

  function toggleTimer() {
      if (isPaused) {
          isPaused = false;
          startTimer();
          event.target.textContent = 'Pause';
      } else {
          isPaused = true;
          event.target.textContent = 'Play';
      }
  }
    function navigateTo(pages){
        window.location.href = pages;
    }
  </script>
</body>
</html>
