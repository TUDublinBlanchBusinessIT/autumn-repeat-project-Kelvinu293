<?php
include 'dbcon.php'; // must connect to event_manager DB

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $event_id    = (int)$_POST['event_id'];
    $attendee_id = (int)$_POST['attendee_id'];
    $arrange     = (int)$_POST['arrange'];
    $people      = (int)$_POST['people'];

    $sql = "INSERT INTO bookings (event_id, attendee_id, arrange, people)
            VALUES ($event_id, $attendee_id, $arrange, $people)";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Booking saved (Event $event_id, Attendee $attendee_id, Arrange $arrange, People $people)";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
