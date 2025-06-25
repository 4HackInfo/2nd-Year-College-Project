const floatingPlayer = document.getElementById('floatingPlayer');
const toggleBtn = document.getElementById('togglePlayer');
const toggleIcon = document.getElementById('toggleIcon');
const playPauseBtn = document.getElementById('playPauseBtn');
const audioPlayer = document.getElementById('audioPlayer');

let tracks = JSON.parse(localStorage.getItem("tracks")) || [];
let currentTrack = parseInt(localStorage.getItem("currentTrack") || 0);
let isPlaying = localStorage.getItem("isPlaying") === "true";
let playbackTime = parseFloat(localStorage.getItem("playbackTime") || 0);

// Initialize player state
floatingPlayer.classList.add("collapsed");

toggleBtn.addEventListener('click', () => {
    floatingPlayer.classList.toggle('collapsed');
    toggleIcon.innerHTML = floatingPlayer.classList.contains('collapsed') ? '>' : '<';
});

playPauseBtn.addEventListener('click', () => {
    if (audioPlayer.paused) {
        audioPlayer.play().catch((err) => {
            console.error('Play error:', err);
        });
        playPauseBtn.innerHTML = "<span style='color:red ; font-size:20px'>⏸</span>";  // Use pause image
        localStorage.setItem("isPlaying", "true");
    } else {
        audioPlayer.pause();
        playPauseBtn.innerHTML = "<span style='color:green' ; font-size:20px>▶</span>";  // Use play image
        localStorage.setItem("isPlaying", "false");
    }
});

// When a track ends, load the next track
audioPlayer.addEventListener("ended", () => {
    currentTrack++;
    if (currentTrack >= tracks.length) {
        currentTrack = 0;  // Loop back to the first track
    }
    localStorage.setItem("currentTrack", currentTrack);
    loadAndPlay();
});

// Update localStorage when the track is played or paused
audioPlayer.addEventListener("play", () => {
    localStorage.setItem("isPlaying", "true");
    playPauseBtn.innerHTML = "<span style='color:red ; font-size:20px'>⏸</span>";  // Use pause image
});

audioPlayer.addEventListener("pause", () => {
    localStorage.setItem("isPlaying", "false");
    playPauseBtn.innerHTML = "<span style='color:green ; font-size:20px'>▶</span>";  // Use play image
});

// Save the playback time periodically
setInterval(() => {
    if (!audioPlayer.paused) {
        localStorage.setItem("playbackTime", audioPlayer.currentTime);
    }
}, 1000);

// Load the current track and start playing
function loadAndPlay() {
    if (tracks.length > 0 && tracks[currentTrack]) {
        audioPlayer.src = tracks[currentTrack].preview;  // Make sure preview link is correct
        audioPlayer.currentTime = playbackTime;

        if (isPlaying) {
            audioPlayer.play().catch((err) => {
                console.error('Play error:', err);
            });
            playPauseBtn.innerHTML = "<span style='color:red ; font-size:20px'>⏸</span>";  // Use pause image
        } else {
            playPauseBtn.innerHTML = "<span style='color:green ; font-size:20px'>▶</span>";  // Use play image
        }

        floatingPlayer.style.display = "block";
    } else {
        console.error('No tracks available or track URL is invalid.');
    }
}

// Call the function to load the current track when the page loads
window.onload = loadAndPlay;
