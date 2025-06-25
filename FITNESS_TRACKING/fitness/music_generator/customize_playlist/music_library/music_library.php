<?php
$music_dir = "storage"; // Relative path for web access
$dir_path = __DIR__ . "/$music_dir";
$files = scandir($dir_path);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Library</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: url(../../../../assets/background.jpg) no-repeat center fixed;
            background-size: cover;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.62);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .music-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .music-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 300px;
            padding: 10px;
            margin: 5px;
            border-radius: 10px;
            background-color: #f8f8f8;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }
        h1,h2{
            color: white;
            letter-spacing: 5px;
        }
        .controls img {
            width: 25px;
            height: 25px;
            cursor: pointer;
        }
        .back{
            display: flex;   
        }
    </style>
</head>
<body>

<div class="back" onclick="navigateTo('../../music_generator.php')">
    <img src="../../back.png" alt="back-button">
</div>


    <h1><strong>Music Library</strong></h1>

    <div class="music-container">
        <?php
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === "mp3") {
                $file_url = "$music_dir/$file";
                echo "<div class='music-item'>";
                echo "<span>" . htmlspecialchars(pathinfo($file, PATHINFO_FILENAME)) . "</span>";
                echo "<div class='controls'>";
                echo "<img src='play.png' class='play-btn' data-src='$file_url' onclick='togglePlay(this)'>";
                echo "</div>";
                echo "</div>";
            }
        }
        ?>
    </div>

    <audio id="audioPlayer"></audio>

    <script>
        var audio = document.getElementById("audioPlayer");
        var currentPlaying = null;

        function togglePlay(btn) {
            var src = btn.getAttribute("data-src");

            // If the same song is clicked, toggle play/pause
            if (currentPlaying === btn) {
                if (audio.paused) {
                    audio.play();
                    btn.src = "pause.png"; // Change to pause icon
                } else {
                    audio.pause();
                    btn.src = "play.png"; // Change to play icon
                }
            } else {
                // Stop current playing audio if another song is clicked
                if (currentPlaying) {
                    currentPlaying.src = "play.png";
                }
                audio.src = src;
                audio.play();
                btn.src = "pause.png"; // Change to pause icon
                currentPlaying = btn;
            }
        }

        // Reset button when audio ends
        audio.addEventListener("ended", function () {
            if (currentPlaying) {
                currentPlaying.src = "play.png";
            }
        });

        function navigateTo(pages){
            window.location.href = pages;
        }
    </script>

</body>
</html>
