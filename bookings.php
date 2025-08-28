<?php
session_start();
include 'dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id    = (int)($_POST['event_id'] ?? 0);
    $attendee_id = (int)($_POST['attendee_id'] ?? 0);
    $people      = (int)($_POST['people'] ?? 0);
    $start_time  = $_POST['start_time'] ?? '';
    $end_time    = $_POST['end_time'] ?? '';

    if ($event_id <= 0 || $attendee_id <= 0 || $people <= 0 || $start_time === '' || $end_time === '') {
        exit('Please fill all fields with valid values.');
    }

    $ev = mysqli_query($conn, "SELECT id FROM events WHERE id=$event_id");
    if (!$ev || mysqli_num_rows($ev) === 0) {
        exit("No such Event ID: $event_id");
    }
    $at = mysqli_query($conn, "SELECT id FROM attendees WHERE id=$attendee_id");
    if (!$at || mysqli_num_rows($at) === 0) {
        exit("No such Attendee ID: $attendee_id");
    }

    $sql = "INSERT INTO bookings (event_id, attendee_id, people, start_time, end_time)
            VALUES ($event_id, $attendee_id, $people, '$start_time', '$end_time')";

    if (mysqli_query($conn, $sql)) {
        echo "Saved booking:<br>
              Event ID: $event_id<br>
              Attendee ID: $attendee_id<br>
              People: $people<br>
              Start: $start_time<br>
              End: $end_time";
    } else {
        echo "DB Error: " . mysqli_error($conn);
    }
} else {
    echo "Open the form and submit.";
}

