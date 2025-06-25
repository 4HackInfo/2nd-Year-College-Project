<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bulking Beginner</title>
  <script src="../../../../fitness/music_generator/music_api/music_player.js" defer></script>
  <link rel="stylesheet" href="../../../../fitness/music_generator/music_api/music_style.css">
  <style>
    body {
      width: 100%;
      height: 100vh;
      margin: 0;
      font-family: 'Arial', sans-serif;
      background: url(../../../../assets/background.jpg) no-repeat center fixed;
      background-size: cover;
      background-blend-mode: color;
      background-color:rgba(0, 0, 0, 0.55);
      display: block;
      justify-items: center;
    }

    .back-button {
      position: absolute;
      top: 20px; 
      left: 20px;
      margin-bottom: 10px;
      cursor: pointer;
    }

    h1, h3 {
      color: whitesmoke;
      letter-spacing: 5px;
      text-align: center;
      margin: 0;
    }
    .main-container{
      margin-top: 50px;
      display: grid;
      align-self: center;
    }
    .day-card {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 10px;
      margin: 10px 0;
      background-color: #f8f8f8;
      cursor: pointer;
      transition: 0.3s;
    }

    .day-card:hover{
      box-shadow: 0 0 5px white, 0 0 30px whitesmoke ;
    }

    .day-card.disabled {
      opacity: 0.5;
      pointer-events: none;
    }

    .day-card img {
      width: 50px;
      height: 50px;
      object-fit: contain;
    }

    .day-card span {
      flex-grow: 1;
      text-align: center;
      font-weight: bold;
    }

    .day-card.locked {
      cursor: not-allowed;
    }

    .reset {
      display: ;
    }
  </style>
</head>
<body>

<div class="back-button" onclick="navigateTo('../bulking_selection.php')">
  <img src="../../back.png" alt="back_button-icon">
</div>

<div class="main-container">
<h1>BULKING</h1>
<h3>ADVANCED (7 x 4)</h3>

<div id="days-container"></div>
<div class="reset">
  <button onclick="resetProgress()" style="margin: 10px auto; display: block;">Reset Progress</button>
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
const daysContainer = document.getElementById("days-container");
const totalDays = 7;

const defaultData = {
  visited: [],
  timestamps: {}
};

let data = JSON.parse(localStorage.getItem("bulking_advanced_progress")) || defaultData;

function saveData() {
  localStorage.setItem("bulking_advanced_progress", JSON.stringify(data));
}

function isUnlocked(dayNum) {
  if (dayNum === 1) return true; // Always unlock Day 1

  const prevDay = dayNum - 1;
  if (!data.visited.includes(prevDay)) return false;

  const lastTime = data.timestamps[`day${prevDay}`];
  if (!lastTime) return false;

  const now = Date.now();
  const timePassed = now - lastTime;

  // 24 hours in milliseconds = 86400000
  return timePassed >= 86400000;
}

function createDayCard(dayNum) {
  const card = document.createElement("div");
  card.className = "day-card";

  const isVisited = data.visited.includes(dayNum);
  const isUnlockedDay = isUnlocked(dayNum);

  if (isVisited) card.classList.add("disabled");
  if (!isUnlockedDay && !isVisited) card.classList.add("locked");

  const img = document.createElement("img");
  if (!isUnlockedDay && !isVisited) {
    img.src = "lock5.png";
  } else {
    img.src = (dayNum % 2 === 0) ? "rest.png" : "workout5.png";
  }

  const label = document.createElement("span");
  label.textContent = (dayNum % 2 === 0) ? `DAY ${dayNum}: REST DAY` : `DAY ${dayNum}`;

  card.appendChild(img);
  card.appendChild(label);

  card.onclick = () => {
    if (!isUnlockedDay || isVisited) return;

    data.visited.push(dayNum);
    data.timestamps[`day${dayNum}`] = Date.now(); // Record timestamp
    saveData();

    window.location.href = `day${dayNum}/day${dayNum}_bulking_advanced.php`;
  };

  return card;
}

// Generate cards
for (let i = 1; i <= totalDays; i++) {
  const card = createDayCard(i);
  daysContainer.appendChild(card);
}

function navigateTo(pages) {
  window.location.href = pages;
}

function resetProgress() {
  localStorage.removeItem("bulking_advanced_progress");
  location.reload();
}
</script>




</body>
</html>
