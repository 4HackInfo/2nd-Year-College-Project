<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Progress Monitoring</title>
  <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
      background: url('assets/background.jpg') no-repeat center center fixed;
      background-size: cover;
      background-blend-mode: color;
      background-color:rgba(0, 0, 0, 0.7);
      color: #333;
      width: 100%;
    }
    .container {
      padding: 20px;
    }
    .header {
      display: flex;
      align-items: center;
      gap: 10px;
      color: white;
      font-weight: bold;
      font-size: 20px;
    }
    .calendar, .report-box {
      width: 90%;
      background: white;
      border-radius: 15px;
      padding: 20px;
      margin-top: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      align-self: center;
      justify-self: center;
    }

    .calendar h2 {
      text-align: center;
      font-weight: bold;
    }
    .days {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      text-align: center;
      margin-top: 10px;
    }
    .day {
      width: 40px;
      height: 40px;
      margin: auto;
      line-height: 40px;
      border-radius: 50%;
      margin-bottom: 10px;
      cursor: pointer;
    }
    .active {
      background-color: #000;
      color: white;
    }
    .report-box {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }
    .report-card {
      background:rgb(255, 255, 255);
      border-radius: 10px;
      padding: 15px;
      margin: 10px;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.49);
      position: relative;
    }  
    .report-card::before{
      content: ".";
      position: absolute;
      top: 10px;
      right: 5px;
      width: 20px;
      background-color:rgb(255, 196, 2);
      border-radius: 100%;
      color: rgb(243, 158, 1);
    }
    .training-style-report{
        margin-top: 20px;
        max-width: 90%;
        border-radius: 20px;
        background-color: white;
        padding: 15px;
        justify-self: center;
    }
    .report-box{
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }
  
    .progress-text{
        text-align: center;
        color: white;
    }
    @media screen and (max-width: 699px) {
      .training-style-report{
        width: 90%;
      }
      .report-box{
        max-height: 100vh;
        display: grid;
        grid-template-columns: repeat(1, 1fr);
      }
    }
 
  </style>
</head>
<body>

<div class="back-button" onclick="navigateTo('dashboard.php')">
        <img src="assets/back.png" alt="back_button-icon">
</div>

<div class="progress-text">
    <h2>Progress Monitoring</h2>
</div>

    <div class="calendar">
      <h2>April 2025</h2>
      <div class="days" id="calendar-days">
        <!-- Calendar days will be populated here -->
      </div>
    </div>

    
   <div class="training-style-report">
    
   <h3>Training Style Reports</h3>
    <div class="report-box">
      <!-- Report cards will be injected here -->
    </div>
    </div>

  </div>
  <button onclick="resetReports()" style="margin: 20px; padding: 10px 15px; border-radius: 8px; border: none; background-color: #e74c3c; color: white; cursor: pointer;">
  Reset Reports
</button>


  <script>
  function formatDate(ms) {
    const date = new Date(ms);
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return date.toLocaleDateString(undefined, options);
  }

  function getAllProgress() {
  const programs = [
    { key: "cutting_beginner_progress", label: "Cutting | Beginner" },
    { key: "cutting_intermediate_progress", label: "Cutting | Intermediate" },
    { key: "cutting_advanced_progress", label: "Cutting | Advanced" },
    { key : "bulking_beginner_progress", label : "Bulking | Beginner"},
    { key : "bulking_intermediate_progress", label: "Bulking | Intermediate"},
    { key : "bulking_advanced_progress", label: "Bulking | Advanced"},
    { key : "cardio_beginner_progress", label: "Cardio | Beginner"},
    { key : "cardio_intermediate_progress", label: "Cardio | Intermediate"},
    { key : "cardio_advanced_progress", label: "Cardio | Advanced"}
  ];

  const reportContainer = document.querySelector('.report-box');
  const reports = [];

  programs.forEach(program => {
    const data = JSON.parse(localStorage.getItem(program.key)) || { visited: [], timestamps: {} };
    data.visited.forEach(dayNum => {
      const timestamp = data.timestamps[`day${dayNum}`];
      if (!timestamp) return;

      reports.push({
        date: new Date(timestamp),
        dayNum,
        label: program.label
      });
    });
  });

  // Sort by date (ascending)
  reports.sort((a, b) => a.date - b.date);

  // Render sorted reports
  reports.forEach(report => {
    const reportElement = document.createElement("div");
    reportElement.className = "report-card";
    reportElement.innerHTML = `
      <strong>${formatDate(report.date)}</strong><br />
      Day ${report.dayNum}<br />
      ${report.label}
    `;
    reportContainer.appendChild(reportElement);
  });
}


  function generateCalendar() {
    const container = document.getElementById('calendar-days');
    const daysInMonth = 30; // April
    const firstDayIndex = new Date(2025, 3, 1).getDay(); // April = 3 (0-based)

    // Aggregate visited days from all levels
    const levels = ["cutting_beginner_progress", "cutting_intermediate_progress", "cutting_advanced_progress", 
                    "bulking_beginner_progress", "bulking_intermediate_progress", "bulking_advanced_progress", 
                    "cardio_beginner_progress", "cardio_intermediate_progress", "cardio_advanced_progress"
                   ];
    const visitedDays = new Set();

    levels.forEach(level => {
      const data = JSON.parse(localStorage.getItem(level)) || { visited: [] };
      const timestamps = data.timestamps || {};
      for (const key in timestamps) {
        const date = new Date(timestamps[key]);
        if (date.getMonth() === 3 && date.getFullYear() === 2025) { // April 2025
          visitedDays.add(date.getDate());
        }
      }
    });

    const dayNames = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
    dayNames.forEach(day => {
      const dayLabel = document.createElement('div');
      dayLabel.innerText = day;
      container.appendChild(dayLabel);
    });

    // Empty cells before first day
    for (let i = 0; i < firstDayIndex; i++) {
      const empty = document.createElement('div');
      container.appendChild(empty);
    }

    // Actual calendar days
    for (let i = 1; i <= daysInMonth; i++) {
      const day = document.createElement('div');
      day.classList.add('day');
      day.innerText = i;
      if (visitedDays.has(i)) {
        day.classList.add('active');
      }
      container.appendChild(day);
    }
  }

  generateCalendar();
  getAllProgress();


  function resetReports() {
  const keys = [
    "cutting_progress",
    "cutting_intermediate_progress",
    "cutting_advanced_progress",
    "bulking_beginner_progress",
    "bulking_intermediate_progress",
    "bulking_advanced_progress",
    "cardio_beginner_progress",
    "cardio_intermediate_progress",
    "cardio_advanced_progress"
  ];

  // Clear localStorage data // RESSSSSSSSSSSSSSSSSSSSSSSSSSSSSEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEETTTTTTTT
  keys.forEach(key => localStorage.removeItem(key));

  // Clear report cards
  const reportContainer = document.querySelector('.report-box');
  reportContainer.innerHTML = "";

  // Clear calendar highlights
  document.querySelectorAll('.day.active').forEach(day => {
    day.classList.remove('active');
  });

  alert("Progress reports have been reset.");
}

  function navigateTo(pages){
    window.location.href = pages;
  }
</script>

</body>
</html>
