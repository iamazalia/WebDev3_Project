<?php
$conn;
// Create connection
function getConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "log_in";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}



// Close connection
function closeConnection()
{
    $conn->close();
}



?>