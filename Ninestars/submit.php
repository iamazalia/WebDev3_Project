<?php
session_start();
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the submitted form data
    $activityName = $_POST["name"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $location = $_POST["location"];
    $ootd = $_POST["ootd"];
    $userID = $_SESSION['id'];

 include_once("db.php");
 $conn=getConnection();

    // Insert the submitted event data into the database
    $sql = "INSERT INTO activities (activityName, date, time, location, ootd,userId)
            VALUES ('$activityName', '$date', '$time', '$location', '$ootd','$userID')";

    if ($conn->query($sql) === TRUE) {
        header("Location: userPage.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>