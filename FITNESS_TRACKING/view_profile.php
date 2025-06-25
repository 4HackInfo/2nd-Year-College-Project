<?php
include 'php/db.php';
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch only the current user's info
$stmt = $conn->prepare("SELECT 
    name, 
    age,
    height,
    weight,
    gender,
    bmi,
    bmi_category
    FROM users_info WHERE user_id = ? LIMIT 1");

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background: url(assets/background.jpg);
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      width: 100%;
      margin: 0;
    }

    .profile-container {
      width: 30%;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      text-align: center
    }

    .my-profile{
      margin-bottom: 35px;
    }
    .body-mass{
      margin-top: 50px;
    }
    h2 {
      letter-spacing: 2px;
      font-size: 16px;
      margin: 20px 0 10px;
    }

    .card {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 15px;
      margin: 10px auto;
      width: 220px;
      text-align: left;
      font-size: 14px;
    }
    .card div{
      margin-top: 20px;
    }

    .card b {
      display: inline-block;
      width: 80px;
    }
    .card b{
      margin-top: 10px;
    }

    .start-btn {
      width: 53%;
      margin-top: 15px;
      background-color: #2c2f24;
      color: white;
      padding: 10px 40px;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
      letter-spacing: 2px;
    }

    .start-btn:hover {
      background-color: #1f221a;
    }
  </style>
</head>
<body>

<div class="profile-container">
  <h2 class="my-profile">MY PROFILE</h2>
  <?php if ($user): ?>
  <div class="card">
    <div><b>NAME:</b> <?= htmlspecialchars($user['name']) ?></div>
    <div><b>AGE:</b> <?= htmlspecialchars($user['age']) ?></div>
    <div><b>HEIGHT:</b> <?= htmlspecialchars($user['height']) ?></div>
    <div><b>WEIGHT:</b> <?= htmlspecialchars($user['weight']) ?></div>
    <div><b>GENDER:</b> <?= htmlspecialchars($user['gender']) ?></div>
  </div>

  <h2 class="body-mass">BODY MASS INDEX</h2>
  <div class="card">
    <div><b>BMI:</b> <?= htmlspecialchars($user['bmi']) ?></div>
    <div><b>CATEGORY:</b> <?= htmlspecialchars($user['bmi_category']) ?></div>
  </div>
<?php else: ?>
  <p>No profile data found.</p>
<?php endif; ?>


  <button class="start-btn" onclick="navigateTo('dashboard.php')">START</button>
</div>

<script>
    function navigateTo(pages){
        window.location.href = pages;
    }
</script>
</body>
</html>
