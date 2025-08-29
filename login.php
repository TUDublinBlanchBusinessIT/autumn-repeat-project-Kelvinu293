<?php
include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $sql)) {
        $message = "User added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
    header("Location: event.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login in</title>
</head>
<body>
  <h2>Login in here</h2>
  <?php if (!empty($message)) echo "<p>$message</p>"; ?>

  <form method="POST" action="">
    Username: <input type="text" name="username" required><br><br>
    Password: <input type="text" name="password" required><br><br>
    <input type="submit" value="Login in">
  </form>

  <h3>Existing Users</h3>
  <ul>
    <?php
    $res = mysqli_query($conn, "SELECT id, username FROM users");
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<li>ID {$row['id']} - {$row['username']}</li>";
    }
    ?>
  </ul>

  <style>
    /* Page layout */
body {
  font-family: Arial, sans-serif;
  background: #f5f7fa;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

/* Login card */
.login-container {
  width: 90%;
  max-width: 380px;
  background: #fff;
  padding: 24px 26px;
  border-radius: 10px;
  box-shadow: 0 6px 14px rgba(0,0,0,.08);
}

/* Heading */
h1 {
  text-align: center;
  margin: 0 0 18px;
  font-size: 20px;
  color: #222;
}

/* Inputs */
input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 9px 10px;
  margin-bottom: 14px;
  border: 1px solid #cfd6df;
  border-radius: 6px;
  font-size: 14px;
  box-sizing: border-box;
}
input:focus {
  outline: none;
  border-color: #6aa0ff;
  box-shadow: 0 0 0 3px rgba(35,115,230,.15);
}

/* Submit */
input[type="submit"] {
  width: 100%;
  padding: 10px 14px;
  background: #2b63d9;
  color: #fff;
  border: 0;
  border-radius: 6px;
  font-size: 14px;
  cursor: pointer;
}
input[type="submit"]:hover {
  background: #ff0000;
}

  </style>
</body>
</html>
