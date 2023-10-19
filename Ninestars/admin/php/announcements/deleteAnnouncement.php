<?php 

include_once '../../../db.php';
$conn = getConnection();
session_start();

if (isset($_POST['deleteAnnouncement']) && $_SESSION['role'] == "admin"){
    $id = $_POST['deleteId'];

    $sql_delete = "DELETE FROM announcements WHERE id = $id";
    
    if ($conn->query($sql_delete) === TRUE) {
        echo "<script>alert('Announcement deleted successfully'); window.location.href='../../admin.php?page=announcement';</script>";
    } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }

}else{
    echo "Unauthorized";
}

?>