<?php

include 'dbcon.php';

// Check if form data was sent using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize input values from the form
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $category = isset($_POST['category']) ? trim($_POST['category']) : '';
    $location = isset($_POST['location']) ? trim($_POST['location']) : '';
    $date = isset($_POST['date']) ? trim($_POST['date']) : '';

     // Ensure user checked the confirmation checkbox
     if (!isset($_POST['info']) || $_POST['info'] !== 'yes') {
        echo "Please tick the checkbox to confirm the information is correct. ";
        exit;
    }
      // Validate required fields
    if ($name === '' || $category === '' || $location === '' || $date === '') {
        echo "Please fill in all fields.";
        exit;
    }
       // Insert new event into the database
    $sql = "INSERT INTO events (name, category,location, event_date)
            VALUES ('$name', '$category', '$location', '$date')";

    if (mysqli_query($conn, $sql)) {
        echo "Event added successfully!";
        echo "<br><a href='attendee.html'>Go to attendee</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Form not submitted.";
}
?>

   
