<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["musicFile"])) {
    $uploadDir = __DIR__ . "/music_library/storage/"; // Corrected the path to music_library folder
    $fileName = basename($_FILES["musicFile"]["name"]);
    $uploadFilePath = $uploadDir . $fileName;

    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create directory if it does not exist
    }

    // Allowed audio file types
    $allowedTypes = ["audio/mpeg", "audio/wav", "audio/ogg"];
    if (!in_array($_FILES["musicFile"]["type"], $allowedTypes)) {
        echo "Error: Only MP3, WAV, and OGG files are allowed.";
        exit;
    }

    // Move uploaded file to music_library
    if (move_uploaded_file($_FILES["musicFile"]["tmp_name"], $uploadFilePath)) {
        echo "Success: Music added to your library!";
    } else {
        echo "Error: Failed to upload file.";
    }
    exit; // Prevents HTML from being included in the response
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize Music</title>
    <style>
        body {
            margin: 0;
            width: 100%;
            height: 100vh;
            background: url(../../../assets/background.jpg) no-repeat center fixed;
            background-size: cover;
            background-blend-mode: color;
            background-color:rgba(0, 0, 0, 0.62);
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .text-customize{
            color: white;
            letter-spacing: 10px;
        }
        .main {
            width: 100%;
            height: 50vh;
            display: grid;
            justify-content: center;
            align-items: center;
            justify-items: center;
        }
        .container-customize {
            background-color:rgb(255, 255, 255);
           
            display: grid;
            justify-content: center;
            align-content: center;
            padding: 52px;
            border-radius: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.81);
            cursor: pointer;
        }

        .container-customize:hover{
            background-color : #ffffff;
            color: black;
            box-shadow: 0 0 10px white, 0 0 25px whitesmoke;
            padding: 55px;
        }
    </style>
</head>
<body>

<div class="image" onclick="navigateTo('../music_generator.php')">
    <img src="../back.png" alt="back-button">
</div>

<div class="main">
    <h1 class="text-customize">Customize Playlist</h1>
    <div class="container-customize" onclick="uploadMusic()">
        <img src="customize_playlist.png" alt="customize-button">
        <h2>ADD MUSIC</h2>
    </div>
    <input type="file" id="musicInput" accept="audio/*" style="display: none;">
</div>

<script>
function uploadMusic() {
    let fileInput = document.getElementById("musicInput");
    fileInput.click();

    fileInput.onchange = function() {
        let file = fileInput.files[0];

        if (!file) {
            alert("No file selected!");
            return;
        }

        let formData = new FormData();
        formData.append("musicFile", file);

        fetch("customize_playlist.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            fileInput.value = "";
        })
        .catch(error => console.error("Upload error:", error));
    };
}

function navigateTo(pages){
    window.location.href = pages;
}
</script>

</body>
</html>
