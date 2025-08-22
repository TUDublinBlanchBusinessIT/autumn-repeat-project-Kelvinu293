<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $_SESSION['logged_in'] = true; 
    header("Location: welcome.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f6fa;
      color: #333;
      text-align: center;
      padding-top: 60px;
    }
    h2 {
      color: #0056b3;
    }
    form {
      background-color: #ffffff;
      padding: 20px;
      display: inline-block;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    input[type="text"], input[type="password"] {
      width: 250px;
      padding: 8px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="submit"] {
      background-color: #28a745;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #218838;
    }
    .error {
      color: red;
      margin-bottom: 10px;
    }
  </style>

</head>
<body>
    <div class="login-container">
        <h1>Login here</h1>
        <form method="post" action="">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
