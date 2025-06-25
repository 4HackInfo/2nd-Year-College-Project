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

<div class="back-button" onclick="navigateTo('../cardio_beginner.php')">
        <img src="../back6.png" alt="back_button-icon">
</div>

  <div class="container" id="mainPage">
    <div class="header">
      <h2>DAY 1</h2>
      <p class="sub-header">Cardio | Beginner</p>
    </div>
    <button class="start-button" onclick="startWorkout()">START</button>

    <div class="task-list">
      <div class="task"><img src="jumping_jack.png" alt="Jumping Jacks"><div class="task-details"><h4>JUMPING JACK</h4><span>30 seconds</span></div></div>
      <div class="task"><img src="high_knees.jpg" alt="High Knees"><div class="task-details"><h4>HIGH KNEES</h4><span>x15 per leg</span></div></div>
      <div class="task"><img src="butt_kicks.jpg" alt="Butt Kicks"><div class="task-details"><h4>BUTT KICKS</h4><span>x15 per leg</span></div></div>
      <div class="task"><img src="mountain_climber.jpg" alt="Mountain Climber"><div class="task-details"><h4>MOUNTAIN CLIMBER</h4><span>30 seconds</span></div></div>
      <div class="task"><img src="burpees.jpg" alt="Burpees"><div class="task-details"><h4>BURPEES</h4><span>x15</span></div></div>
      <div class="task"><img src="high_knees.jpg" alt="High Knees"><div class="task-details"><h4>HIGH KNEES</h4><span>x15 per leg</span></div></div>
      <div class="task"><img src="butt_kicks.jpg" alt="Butt Kicks"><div class="task-details"><h4>BUTT KICKS</h4><span>x15 per leg</span></div></div>
      <div class="task"><img src="mountain_climber.jpg" alt="Mountain Climber"><div class="task-details"><h4>MOUNTAIN CLIMBER</h4><span>30 seconds</span></div></div>
      <div class="task"><img src="burpees.jpg" alt="Burpees"><div class="task-details"><h4>BURPEES</h4><span>x15</span></div></div>
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
    
        "Jumping Jack 30 seconds",
        "High Knees x15 per leg",
        "Butt Kicks x15 per leg",
        "Watwr Break",
        "Mountain Climber 30 seconds",
        "Burpees x15",
        "High Knees x15 per leg",
        "Butt Kicks x15 per leg",
        "Water Break",
        "Mountain Climber 30 seconds",
        "Burpees x15",
    ];

    const animations = {
      
      "Jumping Jack 30 seconds": "jumping_jack.gif",
      "High Knees x15 per leg": "high_knees.gif",
      "Butt Kicks x15 per leg": "butt_kicks.gif",
      "Water Break": "water_break.png",
      "Mountain Climber 30 seconds": "mountain_climber.gif",
      "Burpees x15": "burpees.gif",
      "High Knees x15 per leg": "high_knees.gif",
      "Butt Kicks x15 per leg": "butt_kicks.gif",
      "Water Break": "water_break.png",
      "Mountain Climber 30 seconds": "mountain_climber.gif",
      "Burpees x15": "burpees.gif",
    };
    
    let currentIndex = 0;
    let timer;
    let timeLeft = 30;
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

      timeLeft = 30;
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
