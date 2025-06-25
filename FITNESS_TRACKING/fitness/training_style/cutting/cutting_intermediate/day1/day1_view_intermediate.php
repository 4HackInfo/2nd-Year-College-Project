<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 1 Workout</title>
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

<div class="back-button" onclick="navigateTo('../cutting_intermediate.php')">
        <img src="../back2.png" alt="back_button-icon">
</div>

  <div class="container" id="mainPage">
    <div class="header">
      <h2>DAY 1</h2>
      <p class="sub-header">Cutting | Intermediate</p>
    </div>
    <button class="start-button" onclick="startWorkout()">START</button>

    <div class="task-list">
      <div class="task"><img src="jumping_jack.png" alt="Jumping Jacks"><div class="task-details"><h4>JUMPING JACK</h4><span>30 SECONDS</span></div></div>
      <div class="task"><img src="push_up.png" alt="Push Up"><div class="task-details"><h4>PUSH UP</h4><span>x8</span></div></div>
      <div class="task"><img src="incline_push_up.png" alt="Incline Push Up"><div class="task-details"><h4>INCLINE PUSH UP</h4><span>x8</span></div></div>
      <div class="task"><img src="knee_push_up.png" alt="Knee Push Up"><div class="task-details"><h4>KNEE PUSH UP</h4><span>x8</span></div></div>
      <div class="task"><img src="widearm_push_up.png" alt="Wide Arm Push Up"><div class="task-details"><h4>WIDE ARM PUSH UP</h4><span>x8</span></div></div>
      <div class="task"><img src="push_up.png" alt="Push Up Again"><div class="task-details"><h4>PUSH UP</h4><span>x8</span></div></div>
      <div class="task"><img src="incline_push_up.png" alt="Incline Push Up Again"><div class="task-details"><h4>INCLINE PUSH UP</h4><span>x8</span></div></div>
      <div class="task"><img src="knee_push_up.png" alt="Knee Push Up Again"><div class="task-details"><h4>KNEE PUSH UP</h4><span>x8</span></div></div>
      <div class="task"><img src="widearm_push_up.png" alt="Wide Arm Again"><div class="task-details"><h4>WIDE ARM PUSH UP</h4><span>x8</span></div></div>
      <div class="task"><img src="cobra_stretch.png" alt="Cobra Stretch"><div class="task-details"><h4>COBRA STRETCH</h4><span>30 SECONDS</span></div></div>
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
      "Jumping Jack",
      "Push Up x8",
      "Incline Push Up x8",
      "Water break",
      "Knee Push Up x8",
      "Wide Arm Push Up x8",
      "Push Up x8",
      "Water break",
      "Incline Push Up x8",
      "Knee Push Up x8",
      "Wide Arm Push Up x8",
      "Cobra Stretch",
    ];

    const animations = {
       
      "Jumping Jack": "jumping_jack.gif",
      "Push Up x8": "push_up.gif",
      "Incline Push Up x8": "incline_push_up.gif",
      "Water break" : "water_break.png",
      "Knee Push Up x8": "knee_push_up.gif",
      "Wide Arm Push Up x8": "widearm_push_up.gif",
      "Water break" : "water_break.png",
      "Push Up x8": "push_up.gif",
      "Incline Push Up x8": "incline_push_up.gif",
      "Knee Push Up x8": "knee_push_up.gif",
      "Wide Arm Push Up x8": "widearm_push_up.gif",
      "Cobra Stretch": "cobra_stretch.gif",
    };
    
    let currentIndex = 0;
    let timer;
    let timeLeft = 30;

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

      timeLeft = 30;
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

    /*MAO NI ANG PROCESS THE VISITED PAGE PARA SA PROGRESS MONITORING*/

   
  const totalDays = 7;
  const localStorageKey = "cutting_intermediate_progress";

  const defaultData = {
    visited: [],
    timestamps: {}
  };

  let data = JSON.parse(localStorage.getItem(localStorageKey)) || defaultData;

  function saveData() {
    localStorage.setItem(localStorageKey, JSON.stringify(data));
  }

  function logVisit(dayNum) {
    if (!data.visited.includes(dayNum)) {
      data.visited.push(dayNum);
      data.timestamps[`day${dayNum}`] = Date.now();
      saveData();
    }
  }

  // Call this when user visits/interacts with the day
  const currentDay = 1;
  logVisit(currentDay);


    function navigateTo(pages){
        window.location.href = pages;
    }
  </script>
</body>
</html>
