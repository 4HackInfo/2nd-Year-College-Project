<?php
$data = [
    "Monday" => [
        "pre" => ["Oatmeal", "Banana", "Egg","Almonds","Toast"],
        "post" => ["Grilled Chicken", "Brown Rice", "Steamed Broccoli","Sweet Potato","Water"]
    ],
    "Tuesday" => [
        "pre" => ["Toast", "Peanut Butter", "Banana","Apple","Egg"],
        "post" => ["Salmon", "Quinoa", "Salad","Avocado","Elektrolyte Drink"]
    ],
    "Wednesday" => [
        "pre" => ["Greek Yogurt", "Berries", "Granola","Banana","Oatmeal"],
        "post" => ["Grilled Chicken", "Sweet Potato", "Spinach","Rice","Water"]
    ],
    "Thursday" => [
        "pre" => ["Protein Shake", "Banana", "Almonds","Egg","Apple"],
        "post" => ["Beef Strips", "Rice", "Salad","Sweet Potato","Mixed Vegetables"]
    ],
    "Friday" => [
        "pre" => ["Egg", "Oatmeal", "Banana","Peanut Butter","Greek Yogurt" ],
        "post" => ["Grilled Fish", "Brown Rice", "Mixed Vegetables","Grilled Chicken","Fresh Juice"]
    ],
    "Saturday" => [
        "pre" => ["Oatmeal", "Honey", "Apple", "Berries", "Almonds"],
        "post" => ["Chicken Breast", "Rice", "Salad", "Grilled Fish", "Lemon Water"]
    ],
    "Sunday" => [
        "pre" => ["Protein Bar", "Toast", "Nuts","Apple","Egg"],
        "post" => ["Grilled Chicken", "Rice", "Steamed Broccoli","Salad","Coconut Water"]
    ]
];

$day = date('l');
$preWorkout = $data[$day]['pre'];
$postWorkout = $data[$day]['post'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Food Recommendation</title>
    <script src="fitness/music_generator/music_api/music_player.js" defer></script>
    <link rel="stylesheet" href="fitness/music_generator/music_api/music_style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('assets/background.jpg') no-repeat center center fixed;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.72);
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
            height: 100vh;
        }
        .container {
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.52);
            margin: 50px auto;
            width: 80%;
            border: 1px solid white;
            border-radius: 10px;
            justify-items:center;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        h2 {
            color: #ffcc00;
        }
        .food-section {
            display: grid;
            grid-template-columns: repeat(5, auto);
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .food-box {
            background-color: #333;
            padding: 15px;
            border-radius: 8px;
            width: 120px;
            font-size: 18px;
            transition: 0.3s;
            margin: 20px;
        }
        .food-box:hover {
            background-color:rgb(27, 27, 24);
            border: 1px solid white;
            color: white;
            cursor: pointer;
        }
        .food-box img {
            width: 100px;
            margin-top: 10px;
            border-radius: 5px;
            aspect-ratio: 1 / 1; /* 1:1 = square */
            object-fit: cover;
        }

        .back-button{
            position: absolute;
            top: 20px;
            left: 20px;
        }

        @media screen and (max-width:1220px) {
            .container{
                width: 90%;
            }
            .food-box {
            margin: 0;
        }
        .food-section {
            display: grid;
            grid-template-columns: repeat(3, auto);
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        body{
            display: flex;
            align-items: center;
        }
        }

        @media screen and (max-width:990px) {
            .food-section{
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
                width: 100%;
            }
        }

       
    </style>

</head>
<body>


<div class="back-button" onclick="navigateTo('dashboard.php')">
        <img src="assets/back.png" alt="back_button-icon">
</div>


<div class="container">
    <h1>Food Recommendation</h1>

    <h2>Today is: <?php echo $day; ?></h2>

    <h2>Pre-Workout</h2>
    <div class="food-section">
        <?php foreach($preWorkout as $food): ?>
            <div class="food-box">
                <?php echo $food; ?>
                <br>
                <img src="images/<?php echo strtolower(str_replace(' ', '', $food)); ?>.jpg" alt="<?php echo $food; ?>">
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Post-Workout</h2>
    <div class="food-section">
        <?php foreach($postWorkout as $food): ?>
            <div class="food-box">
                <?php echo $food; ?>
                <br>
                <img src="images/<?php echo strtolower(str_replace(' ', '', $food)); ?>.jpg" alt="<?php echo $food; ?>">
            </div>
        <?php endforeach; ?>
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
    const foodBoxes = document.querySelectorAll('.food-box');
    foodBoxes.forEach(box => {
        box.addEventListener('click', () => {
            alert('Food: ' + box.innerText);
        });
    });

    function navigateTo(pages){
        window.location.href = pages;
    }
</script>

</body>
</html>
