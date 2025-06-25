<?php
$genre = isset($_GET['genre']) ? $_GET['genre'] : "neffex"; // Default genre
$apiUrl = "https://api.deezer.com/search?q=" . urlencode($genre);

$response = file_get_contents($apiUrl);
$data = json_decode($response, true);
$filteredTracks = [];

// Filter songs with duration >= 200 seconds (3 minutes 20 seconds)
if (!empty($data['data'])) {
    foreach ($data['data'] as $track) {
        if ($track['duration'] >= 200) { 
            $filteredTracks[] = $track;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #fff;
            background: url(../../../assets/background.jpg) no-repeat center fixed;
            background-size: cover;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.62);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        
        .container {
            width: 90%;
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 22px;
            font-weight: bold;
        }

        .back-btn, .home-btn {
            position: absolute;
            top: 20px;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .back-btn {
            left: 20px;
        }

        .home-btn {
            top: auto;
            bottom: 20px;
        }

        .music-list {
            margin-top: 20px;
        }

        .music-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            padding: 10px;
            margin: 10px 0;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .play-btn {
            background: transparent;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-btn" onclick="navigateTo('music_api.php')">
            <img src="back.png" alt="Back" width="60">
        </button>
        <h2><?php echo ucfirst($genre); ?> Music</h2>

        <div class="music-list">
            <?php if (!empty($filteredTracks)): ?>
                <?php foreach ($filteredTracks as $index => $track): ?>
                    <div class="music-item">
                        <span><?php echo htmlspecialchars($track['title']); ?> - <?php echo htmlspecialchars($track['artist']['name']); ?></span>
                        <button class="play-btn" id="playBtn<?php echo $index; ?>" onclick="togglePlay(<?php echo $index; ?>)">
                            <img src="play.png" alt="Play" width="30">
                        </button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No results found.</p>
            <?php endif; ?>
        </div>

        <audio id="audioPlayer" controls hidden></audio>
    </div>

    <script>
       let tracks = <?php echo json_encode($filteredTracks); ?>;
    let player = document.getElementById("audioPlayer");
    let currentTrack = localStorage.getItem("currentTrack") !== null ? parseInt(localStorage.getItem("currentTrack")) : 0;
    let playbackTime = localStorage.getItem("playbackTime") ? parseFloat(localStorage.getItem("playbackTime")) : 0;
    let isPlaying = localStorage.getItem("isPlaying") === "true";
    localStorage.setItem("tracks", JSON.stringify(tracks));


    function playTrack(index) {
        if (tracks.length > 0 && tracks[index]) {
            player.src = tracks[index].preview;
            player.currentTime = 0;
            player.play();
            localStorage.setItem("currentTrack", index);
            localStorage.setItem("isPlaying", "true");
            currentTrack = index;
            updatePlayButtons();
        }
    }

    function togglePlay(index) {
        if (currentTrack === index) {
            if (player.paused) {
                player.play();
                localStorage.setItem("isPlaying", "true");
            } else {
                player.pause();
                localStorage.setItem("isPlaying", "false");
            }
        } else {
            playTrack(index);
        }
        updatePlayButtons();
    }

    function updatePlayButtons() {
        document.querySelectorAll(".play-btn img").forEach((img, idx) => {
            if (idx === currentTrack) {
                img.src = player.paused ? "play.png" : "pause.png";
            } else {
                img.src = "play.png";
            }
        });
    }

    player.addEventListener("ended", function () {
        currentTrack++;
        if (currentTrack >= tracks.length) {
            currentTrack = 0;
        }
        playTrack(currentTrack);
    });

    player.addEventListener("pause", function () {
        localStorage.setItem("isPlaying", "false");
        updatePlayButtons();
    });

    player.addEventListener("play", function () {
        localStorage.setItem("isPlaying", "true");
        updatePlayButtons();
    });

    window.onload = function () {
        if (tracks.length > 0 && currentTrack < tracks.length) {
            player.src = tracks[currentTrack].preview;
            player.currentTime = playbackTime;
            if (isPlaying) {
                player.play();
            }
            updatePlayButtons();
        }
    };

    setInterval(() => {
        if (!player.paused && currentTrack !== null) {
            localStorage.setItem("playbackTime", player.currentTime);
        }
    }, 1000);

    function navigateTo(page) {
        window.location.href = page;
    }
    </script>
</body>
</html>