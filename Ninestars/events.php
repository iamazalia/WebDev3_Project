<?php
$sql = "SELECT * FROM events";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Event ID: " . $row["id"] . "<br>";
        echo "Activity Name: " . $row["activity_name"] . "<br>";
        echo "Date: " . $row["date"] . "<br>";
        echo "Time: " . $row["time"] . "<br>";
        echo "Location: " . $row["location"] . "<br>";
        echo "OOTD: " . $row["ootd"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No events found.";
}

$conn->close();
?>