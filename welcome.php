<?php
// Start session
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: event.html"); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #A4C8E1; 
            color: #000000; 
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 50px;
        }
        h1 {
            font-size: 2.5em;
        }
        p {
            font-size: 1.2em;
        }
        a {
            text-decoration: none;
            color: #FFFFFF;
            background-color: #2D68C4; 
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            margin-top: 20px;
            display: inline-block;
        }
        a:hover {
            background-color: #CD1C18; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Come and booking with us for events</h1>
        <p>Welcome to event planning.</p>
        <p>Click the bottom buttom to book with us:</p>
        <a href="event.html">Book here</a>
    </div>
</body>
</html>
