<?php
include_once('db.php');

$conn = getConnection();

$remark = $_GET['status'];
$actID = $_GET['id'];

$Sql = "UPDATE activities SET remark = '" . $remark . "' WHERE id = $actID";
$result = mysqli_query($conn, $Sql);

if ($conn->query($Sql) === TRUE) {
    header("Location: userPage.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
closeConnection();

?>