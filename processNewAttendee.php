<?php
include 'dbcon.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname'])  : '';
    $email = isset($_POST['email']) ? trim($_POST['email'])     : '';
    $type = isset($_POST['type']) ? trim($_POST['type'])      : '';

    if ($firstname === '' || $lastname === '' || $email === '' || $type === '') {
        echo "Please fill in all fields.";
        exit;
    }

    $sql = "INSERT INTO attendees (firstname, lastname, email, type)
            VALUES ('$firstname', '$lastname', '$email', '$type')";

    if (mysqli_query($conn, $sql)) {
        echo "Attendee added successfully. ";
        echo "<a href='attendee.html'>Add another</a>";
        echo "<a href='listAttendees.php'>View list</a>";
    } else {
        echo "Error: " . htmlspecialchars(mysqli_error($conn));
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}
