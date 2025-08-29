<?php
include 'dbcon.php'; 

// Check if form data was sent using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';  // Collect and sanitize form inputs
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname'])  : '';
    $email = isset($_POST['email']) ? trim($_POST['email'])     : '';
    $type = isset($_POST['type']) ? trim($_POST['type'])      : '';

    // Validate inputs: ensure no field is empty
    if ($firstname === '' || $lastname === '' || $email === '' || $type === '') {
        echo "Please fill in all fields.";
        exit;
    }

    $sql = "INSERT INTO attendees (firstname, lastname, email, type)
            VALUES ('$firstname', '$lastname', '$email', '$type')";

    if (mysqli_query($conn, $sql)) {
        echo "Attendee added successfully. ";
        echo "<a href='bookings.html'>Book here</a>"; // Display database error (safely escaped)
    } else {
        echo "Error: " . htmlspecialchars(mysqli_error($conn));
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
