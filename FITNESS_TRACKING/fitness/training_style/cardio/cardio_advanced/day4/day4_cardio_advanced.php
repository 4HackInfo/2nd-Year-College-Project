<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Day 4 - Rest and Recovery</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #fff;
      color: #000;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding: 20px;
    }

    .back-button {
      align-self: flex-start;
      margin-bottom: 20px;
    }

    .back-button img {
      width: 60px;
      height: 60px;
      cursor: pointer;
    }

    h1 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 0;
    }

    h2 {
      font-size: 14px;
      font-weight: bold;
      margin-top: 0;
      margin-bottom: 20px;
    }

    .section {
      margin-bottom: 20px;
      text-align: left;
      max-width: 300px;
    }

    .section-title {
      font-weight: bold;
      font-size: 14px;
      margin-bottom: 8px;
    }

    .section-content {
      font-size: 12px;
      color: #555;
    }

    ul {
      font-size: 12px;
      color: #555;
      padding-left: 20px;
    }

    ul li {
      margin-bottom: 4px;
    }
    
  </style>
</head>
<body>
  <div class="back-button" onclick="navigateTo('../cardio_advanced.php')">
    <img src="../back8.png" alt="Back Button">
  </div>

  <h1>DAY 4</h1>
  <h2>REST AND RECOVERY</h2>

  <div class="section">
    <div class="section-title">Why Rest is Important?</div>
    <div class="section-content">
      Rest days help muscles recover, prevent injuries, and improve overall performance.
    </div>
  </div>

  <div class="section">
    <div class="section-title">What to do?</div>
    <ul>
      <li>Light stretching</li>
      <li>Foam rolling</li>
      <li>Meditation &amp; breathing exercises</li>
      <li>Hydration &amp; balanced nutrition</li>
    </ul>
  </div>

  <div class="section">
    <div class="section-title">Hydration Reminder</div>
    <div class="section-content">
      - Drink water every 30 minutes.
    </div>
  </div>

  <script>
    function navigateTo(pages){
        window.location.href = pages;
    }
  </script>
</body>
</html>
