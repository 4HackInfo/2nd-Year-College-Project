<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <button onclick="history.back()" class="back-btn">←</button>
        <?php
        $sql = "SELECT username, user_points FROM users_info ORDER BY user_points DESC LIMIT 6";
        $result = $conn->query($sql);
        $icons = ['gold1.png', 'silver.png', 'bronze.png', 'top.png','top.png','top.png'];
        $rank = 0;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="user-card">';
                echo '<img src="icons/' . $icons[$rank] . '" class="icon">';
                echo '<span class="username">' . htmlspecialchars($row['username']) . '</span>';
                echo '</div>';
                $rank++;
            }
        } else {
            echo "<p>No users found</p>";
        }
        ?>
    </div>

</body>
</html>
