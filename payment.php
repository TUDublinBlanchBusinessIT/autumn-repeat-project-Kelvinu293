<?php

include 'dbcon.php'; 

// Check if form data was sent using POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = (int)($_POST['booking_id'] ?? 0);
    $amount = $_POST['amount'] ?? '';
    $paid_at = $_POST['paid_at'] ?? ''; 
    $method = $_POST['method'] ?? '';

    // Ensure payment method is selected
    if ($method === '') {
        exit('Please select a payment method.');
    }
     // Validate booking ID and amount
    if ($booking_id <= 0 || $amount === '') {
        exit('Please enter Booking ID and Amount.');
    }
       // Check if booking exists in database
    $q = mysqli_query($conn, "SELECT id FROM bookings WHERE id=$booking_id");
    if (!$q || mysqli_num_rows($q) === 0) {
        exit("No booking with ID $booking_id.");
    }
    
    // If no custom paid_at provided, use current time
    if ($paid_at === '') {
        $sql = "INSERT INTO payment (booking_id, amount, paid_at)
                VALUES ($booking_id, $amount, NOW())";
    } else {
        $paid_at = str_replace('T', ' ', $paid_at) . ':00';  // Convert datetime-local input format into valid MySQL datetime
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
