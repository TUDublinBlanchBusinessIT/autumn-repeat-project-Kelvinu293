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
</body>
</html>
