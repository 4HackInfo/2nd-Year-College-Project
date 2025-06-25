<?php
session_start();
include '../../../php/db.php'; // ✅ Your DB connection file

// Security check
if (!isset($_SESSION['user_id']) || !isset($_POST['points'])) {
    echo "Invalid request.";
    exit;
}

$user_id = $_SESSION['user_id']; // ✅ Safe from session
$points = intval($_POST['points']); // Sanitize input

if ($points <= 0) {
    echo "Invalid points.";
    exit;
}

// Debug: Check session data
if (!isset($_SESSION['user_id'])) {
    echo "User is not logged in. Session ID: " . session_id(); // Debug session ID
    exit;
}

// ✅ Store in the `users_info` table, in the `user_points` column
$sql = "UPDATE users_info SET user_points = user_points + ? WHERE user_id = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo "Prepare failed: " . $conn->error;
    exit;
}

$stmt->bind_param("ii", $points, $user_id);

if ($stmt->execute()) {
    echo "Points updated successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
