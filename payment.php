<?php

include 'dbcon.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = (int)($_POST['booking_id'] ?? 0);
    $amount = $_POST['amount'] ?? '';
    $paid_at = $_POST['paid_at'] ?? ''; 
    $method = $_POST['method'] ?? '';

    if ($method === '') {
        exit('Please select a payment method.');
    }

    if ($booking_id <= 0 || $amount === '') {
        exit('Please enter Booking ID and Amount.');
    }

    $q = mysqli_query($conn, "SELECT id FROM bookings WHERE id=$booking_id");
    if (!$q || mysqli_num_rows($q) === 0) {
        exit("No booking with ID $booking_id.");
    }

    if ($paid_at === '') {
        $sql = "INSERT INTO payment (booking_id, amount, paid_at)
                VALUES ($booking_id, $amount, NOW())";
    } else {
        $paid_at = str_replace('T', ' ', $paid_at) . ':00';
        $sql = "INSERT INTO payment (booking_id, amount, paid_at)
                VALUES ($booking_id, $amount, '$paid_at')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Saved payment: Booking $booking_id, Amount $amount Method chosen: $method";
    } else {
        echo "DB Error: " . mysqli_error($conn);
    }
} else {
    echo "Open paymentForm.html and submit.";
}
