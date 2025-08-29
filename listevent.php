<?php
include 'dbcon.php';

// Query to fetch all events ordered by date
$sql = "SELECT id, name, category, location, event_date 
        FROM events 
        ORDER BY event_date ASC";
 
 // Check if there are events in the database 
$result = mysqli_query($conn, $sql);

 // Create a table to show events in database
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Location</th>
            <th>Date</th>
          </tr>";

       // Loop through each event and show it in the table
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['category']) . "</td>";
        echo "<td>" . htmlspecialchars($row['location']) . "</td>";
        echo "<td>" . $row['event_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No events found.";
}

mysqli_close($conn);
?>
