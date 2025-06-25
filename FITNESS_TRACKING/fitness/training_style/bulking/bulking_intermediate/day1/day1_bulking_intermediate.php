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
    }
  </style>
</head>
<body>

<div class="back-button" onclick="navigateTo('../bulking_intermediate.php')">
        <img src="../back4.png" alt="back_button-icon">
</div>

  <div class="container" id="mainPage">
    <div class="header">
      <h2>DAY 1</h2>
      <p class="sub-header">Bulking | Intermediate</p>
      </p>
    </div>
    <button class="start-button" onclick="startWorkout()">START</button>

    <div class="task-list">
      <div class="task"><img src="jumping_jack.png" alt="Jumping Jacks"><div class="task-details"><h4>JUMPING JACK</h4><span>40 seconds</span></div></div>
      <div class="task"><img src="diamond_pushup.jpg" alt=" Diamond_Push_Up"><div class="task-details"><h4> DIAMOND PUSH UP</h4><span>x14</span></div></div>
      <div class="task"><img src="close_grip_pushup.jpg" alt="Incline Push Up"><div class="task-details"><h4>CLOSE GRIP PUSH UP</h4><span>x14</span></div></div>
      <div class="task"><img src="chin_up_hold.jpg" alt="Chin Up Hold"><div class="task-details"><h4>CHIN UP HOLD</h4><span>40 seconds</span></div></div>
      <div class="task"><img src="wrist_stretch.jpg" alt="Wrist Flexor Stretch "><div class="task-details"><h4>WRIST FLEXOR STRETCH </h4><span>40 seconds</span></div></div>
      <div class="task"><img src="tricep_dips.jpg" alt="Tricep Dips"><div class="task-details"><h4>TRICEP DIPS</h4><span>x14</span></div></div>
      <div class="task"><img src="diamond_pushup.jpg" alt=" Diamond_Push_Up"><div class="task-details"><h4> DIAMOND PUSH UP</h4><span>x14</span></div></div>
      <div class="task"><img src="close_grip_pushup.jpg" alt="Incline Push Up"><div class="task-details"><h4>CLOSE GRIP PUSH UP</h4><span>x14</span></div></div>
      <div class="task"><img src="chin_up_hold.jpg" alt="Chin Up Hold"><div class="task-details"><h4>CHIN UP HOLD</h4><span>40 seconds</span></div></div>
      <div class="task"><img src="wrist_stretch.jpg" alt="Wrist Flexor Stretch "><div class="task-details"><h4>WRIST FLEXOR STRETCH </h4><span>40 seconds</span></div></div>
      <div class="task"><img src="tricep_dips.jpg" alt="Tricep Dips"><div class="task-details"><h4>TRICEP DIPS</h4><span>x14</span></div></div>
      <div class="task"><img src="cobra_stretch.png" alt="Cobra Stretch"><div class="task-details"><h4>COBRA STRETCH</h4><span>40 seconds</span></div></div>
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
      "Jumping Jacks 40 seconds",
      "Diamond Push Up x14",
      "Close Grip Push Up x14",
      "water break",
      "Chin up Hold 40 seconds",
      "Wrist Flexor Stretch 40 seconds",
      "Tricep Dips x14",
      "water break",
      "Diamond Push Up x14",
      "Close Grip Push Up x14",
      "Chin up Hold 40 seconds",
      "water break",
      "Wrist Flexor Stretch 40 seconds",
      "Tricep Dips x14",
      "Cobra Stretch 40 seconds"
    ];

    const animations = {
       
      "Jumping Jacks 40 seconds": "jumping_jack.gif",
      "Diamond Push Up x14": "Diamond_Push-Up_GIF.gif",
      "Close Grip Push Up x14": "close_grip_pushup.gif",
      "water break" : "water_break.png",
      "Chin up Hold 40 seconds" : "chin_up_hold.gif",
      "Wrist Flexor Stretch 40 seconds": "wrist_stretch.gif",
      "Tricep Dips x14": "tricep_dips.gif",
      "water break": "water_break.png",
      "Diamond Push Up x14": "Diamond_Push-Up_GIF.gif",
      "Close Grip Push Up x14": "close_grip_pushup.gif",
      "Chin up Hold 40 seconds" : "chin_up_hold.gif",
      "water break" : "water_break.png",
      "Wrist Flexor Stretch 40 seconds": "wrist_stretch.gif",
      "Tricep Dips x14": "tricep_dips.gif",
      "Cobra Stretch 40 seconds": "cobra_stretch.gif"
    };
    
    let currentIndex = 0;
    let timer;
    let timeLeft = 40;

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

      timeLeft = 40;
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
