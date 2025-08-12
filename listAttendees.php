<?php
include 'dbcon.php';

$sql = "SELECT id, firstname, lastname, email, type
        FROM attendees
        ORDER BY lastname, firstname";

$result = mysqli_query($conn, $sql);

echo "<h2>Attendees</h2>";
echo "<p><a href='attendee.html'>Add attendee</a></p>";

if ($result && mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>First</th>
            <th>Last</th>
            <th>Email</th>
            <th>Type</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . (int)$row['id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
        echo "<td>" . htmlspecialchars($row['lastname'])  . "</td>";
        echo "<td>" . htmlspecialchars($row['email'])     . "</td>";
        echo "<td>" . htmlspecialchars($row['type'])      . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No attendees found.";
}

mysqli_close($conn);
