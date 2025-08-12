<?php
include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $category = isset($_POST['category']) ? trim($_POST['category']) : '';
    $location = isset($_POST['location']) ? trim($_POST['location']) : '';
    $date = isset($_POST['date']) ? trim($_POST['date']) : '';
    

    if ($name === '' || $category === '' || $location === '' || $date === '') {
        echo "Please fill in all fields.";
        exit;
    }

    $sql = "INSERT INTO events (name, category,location, event_date)
            VALUES ('$name', '$category', '$location', '$date')";

    if (mysqli_query($conn, $sql)) {
        echo "Event added successfully!";
        echo "<br><a href='event.html'>Add another event</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Form not submitted.";
}
?>

   
