
<?php 

session_start();
    function getSessions()
    {
      global $conn;
      $sessionId = $_SESSION['id'];
      $role = $_SESSION['role'];
      $sql = "SELECT * FROM user WHERE (id = '$sessionId' AND role = '$role')";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      return $row;
    }
?>