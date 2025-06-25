<?php 
include 'php/db.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            background: url(assets/background.jpg) fixed no-repeat center;
            background-size: cover;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.66);
            margin: 0;
            width: 100%;
            height: 100vh;
        }

        
        .container {
            width: 100%;
            max-width: 400px;
            margin-top: 100px;
            
        }

        .text-leaderboard{
            color:white;
            text-align: center;
            letter-spacing: 10px;
        }

        .back-btn {
            background: none;
            border: none;
            font-size: 24px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .user-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fefefe;
            border-radius: 10px;
            padding: 10px 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .left-content {
            display: flex;
            align-items: center;
        }

        .user-card .icon {
            width: 24px;
            height: 24px;
            margin-right: 15px;
        }

        .username {
            font-weight: bold;
        }

        .points {
            font-weight: bold;
            color: #555;
        }
        .back-button{
            position: absolute;
            top: 20px;
            left: 35px;
        }
        @media screen and (max-width : 1000px){
            
            .container {
            width: 100%;
            max-width: 800px;
            height: 100vh;
            
        }
        .user-card{
            height: 50px;
            font-size: 30px;
        }

        }
    </style>
</head>
<body>

<div class="back-button" onclick="navigateTo('dashboard.php')">
        <img src="assets/back.png" alt="back_button-icon">
</div>


    <div class="container">
    <div class="text-leaderboard"><h2>LEADERBOARD</h2></div>
        <?php
        $sql = "SELECT name, user_points FROM users_info ORDER BY user_points DESC LIMIT 6";
        $result = $conn->query($sql);
        $icons = ['gold1.png', 'silver.png', 'bronze.png','top.png','top.png','top.png'];
        $rank = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="user-card">';
                echo '  <div class="left-content">';
                echo '      <img src="assets/' . $icons[$rank] . '" class="icon">';
                echo '      <span class="username">' . htmlspecialchars($row['name']) . '</span>';
                echo '  </div>';
                echo '  <span class="points">' . $row['user_points'] . ' pts</span>';
                echo '</div>';
                $rank++;
            }
        } else {
            echo "<p>No users found</p>";
        }   
        ?>
    </div>

    <script>
        function navigateTo(pages){
            window.location.href = pages;
        }
    </script>
</body>
</html>
