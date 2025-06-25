<?php
include 'db.php';
session_start();

// Make sure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit;
}

$user_id = $_SESSION['user_id'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate inputs
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    $height = trim($_POST['height']);
    $weight = trim($_POST['weight']);
    $gender = trim($_POST['gender']);

    if (empty($name) || empty($age) || empty($height) || empty($weight) || empty($gender)) {
        echo "All fields are required!";
        exit;
    }

    // Convert height to meters if given in cm
    if ($height > 3) {
        $height = $height / 100;
    }
    
    // Calculate BMI
    $bmi = $weight / ($height * $height);

    // Determine BMI category
    if ($bmi < 18.5) {
        $bmi_category = "Underweight";
    } elseif ($bmi < 24.9) {
        $bmi_category = "Normal";
    } elseif ($bmi < 29.9) {
        $bmi_category = "Overweight";
    } else {
        $bmi_category = "Obese";
    }

    // Prepare SQL query
    $sql = "INSERT INTO users_info (user_id, name, age, height, weight, gender, bmi, bmi_category, user_points)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";



    if ($stmt = $conn->prepare($sql)) {
        $user_points = 0;
        $stmt->bind_param("isiddsdsi", $user_id, $name, $age, $height, $weight, $gender, $bmi, $bmi_category, $user_points);


        if ($stmt->execute()) {
            header("Location: ../view_profile.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Failed to prepare the SQL statement.";
    }

    $conn->close();
} else {
    echo "No data submitted.";
}
?>
