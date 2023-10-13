<?php
include_once('db.php');
$conn = getConnection();

$id = $_GET['actID'];
$actName = $_POST['actName'];
$date = $_POST['date'];
$time = $_POST['time'];
$location = $_POST['location'];
$ootd = $_POST['ootd'];
$sql = "UPDATE activities SET activityName='$actName', date='$date', time='$time', location='$location', ootd='$ootd' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header('Location: userPage.php');
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

closeConnection($conn);
?>