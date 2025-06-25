<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 5 Workout</title>
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
        width: 50%;
    }

  </style>
</head>
<body>

<div class="back-button" onclick="navigateTo('../cutting_advanced.php')">
        <img src="../back1.png" alt="back_button-icon">
</div>

  <div class="container" id="mainPage">
    <div class="header">
      <h2>DAY 5</h2>
      <p class="sub-header">Cutting | Advanced</p>
    </div>
    <button class="start-button" onclick="startWorkout()">START</button>

    <div class="task-list">
      <div class="task"><img src="jumping_jacks.png" alt="jumping jack"><div class="task-details"><h4>Jumping Jacks</h4><span>45 seconds</span></div></div>
      <div class="task"><img src="abdominal_crunches.png" alt="crunches"><div class="task-details"><h4>Abdominal Crunches</h4><span>x 18</span></div></div>
      <div class="task"><img src="russian_twist.png" alt="russian_twist"><div class="task-details"><h4>Russian Twist</h4><span> x 16</span></div></div>
      <div class="task"><img src="plank.png" alt="plank man"><div class="task-details"><h4>Planking </h4><span>45 seconds</span></div></div>
      <div class="task"><img src="leg_raises.png" alt="leg_raises"><div class="task-details"><h4>Leg Raises</h4><span> x 16</span></div></div>
      <div class="task"><img src="abdominal_crunches.png" alt="abdominal_crunches"><div class="task-details"><h4>Abdominal Crunches</h4><span> x 18</span></div></div>
      <div class="task"><img src="russian_twist.png" alt="russian_twist"><div class="task-details"><h4>Russian Twist</h4><span> x 16</span></div></div>
      <div class="task"><img src="plank.png" alt="plank man"><div class="task-details"><h4>Planking </h4><span>45 seconds</span></div></div>
      <div class="task"><img src="leg_raises.png" alt="leg_raises"><div class="task-details"><h4>Leg Raises</h4><span> x 16</span></div></div>
      <div class="task"><img src="cobra_stretch.png" alt="cobra_stretch"><div class="task-details"><h4>Cobra Stretch</h4><span>45 seconds</span></div></div>
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
      "Jumping Jacks 45 seconds",
      "Abdominal Crunches x18",
      "Russian Twist x16",
      "Water Break",
      "Planking 45 seconds",
      "Leg Raises x16",
      "Abdominal Crunches x18",
      "Water Break",
      "Russian Twist x16",
      "Planking 45 seconds",
      "Leg Raises x16",
      "Cobra Stretch 45 seconds",
    ];

    const animations = {
      "Jumping Jacks 45 seconds" : "jumping_jack.gif",
      "Abdominal Crunches x18" : "abdominal_crunches.gif",
      "Russian Twist x16" : "russian_twist.gif", 
      "Water Break" :  "water_break.png ",
      "Planking 45 seconds" : "planking.gif",
      "Leg Raises x16" : "leg_raises.gif",
      "Abdominal Crunches x18" : "abdominal_crunches.gif",
      "Water Break" :  "water_break.png ",
      "Russian Twist x16" : "russian_twist.gif",
      "Planking 45 seconds" : "planking.gif",
      "Leg Raises x16" : "leg_raises.gif",
      "Cobra Stretch 45 seconds" : "cobra_stretch.gif",
    };
    
    let currentIndex = 0;
    let timer;
    let timeLeft = 45;

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

      timeLeft = 45;
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
