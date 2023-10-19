<?php
session_start();
include_once("db.php");

$username = $_POST["Username"];
$password = $_POST["Password"];


$conn = getConnection();
$sql = "SELECT * from user where email = '".$username."' AND password = '".$password."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if($row["email"] == $username && $row["password"]== $password)
{
    if($row["role"]=="admin")
    {        
        header("Location: admin/admin.php");
    }
    else
    {        
        header("Location: userPage.php");
    }
    $_SESSION["role"] = $row["role"];
    $_SESSION["id"] = $row["id"];
    
}
else
{
    echo "<script>alert('Invalid Email or Password');
        window.location.href='login.html';
    </script>";

}
closeConnection();


?>